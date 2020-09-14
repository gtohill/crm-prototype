<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Contact;
use App\Company;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
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
            'due_date' => request('due_date'),
            'description' => request('description'),           
            'status' => request('status')
        ]);

        $contact->tasks()->save($task);        

        return response()->json($contact->tasks);
    }

    /**
     * Display the specified task resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    
    {
        $task = Task::findorfail($id);
        $contact = Contact::findorfail($task->contact_id);
        $company = Company::findorfail($contact->company_id);
        $item = ['name'=>$company['name'], 'first_name'=>$contact['first_name'],'last_name'=>$contact['last_name'],'phone'=>$contact['phone'],'email'=>$contact['email'] ,'id'=>$task['id'], 'due_date'=>$task['due_date'], 'description'=>$task['description'], 'status'=>$task['status']];
        
        return response()->json($item); 
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

        return response()->json($task);
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
}
