<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Contact;
use App\Company;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {        

        // // get all open tasks
        $tasks = Task::all()->where('status', 0);
        
        $items_arr = [];
        // get all contacts and companies with an open task
        foreach($tasks as $task){
            
            $contact = Contact::where('id', $task['contact_id'])->get();//get()->where('id', $task['contact_id']);  
            
            $company = Company::where('id', $contact[0]['company_id'])->get();//get()->where('id', $contact['company_id']);
            
            $item = ['id'=>$task['id'] ,'name'=> $company[0]['name'], 'first_name'=> $contact[0]['first_name'], 'last_name'=>$contact[0]['last_name'], 'date'=>$task['due_date'],'description'=>$task['description'], 'status'=>$task['status']];
            array_push($items_arr, $item);
        }
        
        
        return response()->json($items_arr);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //      
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = Contact::findorfail(request('contact_id'));
        
        $task = new Task([
            'user_id' =>  auth()->user()->id,
            'due_date' => request('due_date'),
            'description' => request('description'),           
            'status' => request('status')
        ]);

        $contact->tasks()->save($task);

        $company = Company::findOrFail($contact->company_id);
        $company->tasks()->save($task);

        return redirect()->action(
            'ContactController@show',
            [$contact->id]
        );

        //return response()->json($contact->tasks);
    }

    /**
     * Display the specified task resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    
    {
        $task = Task::findOrFail($id);
        $task->contact;
        $task->company;

        return view('dashboard.task')->with(['item'=>$task]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {   
        $task->save();
        return response()->json($task);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->due_date = request('due_date');
        $task->description = request('description');
        $task->status = request('status');
        $task->save();

        $updated_task = Task::findOrFail($id);
        $updated_task->contact;
        $updated_task->company;

        $message = '';
        if($updated_task->status == 0){
            $message = "Success! Task Updated";
        }else{
            $message = 'Success! Task Completed';
        }
        return view('dashboard.task')->with(['item'=>$updated_task])->with(['message'=> $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return "Task Deleted";
        
    }
    /**
     * create new task that belongs to specific contact and company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createtask($id)    
    {       
        $contact = Contact::findOrFail($id);
        $contact->company;
        //return response()->json($company);
        return view('dashboard.createtask')->with(['createtask'=>$contact]);
    }
}
