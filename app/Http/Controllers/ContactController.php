<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Contact;
use App\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return response()->json($contacts);
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
     * Store a newly created contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check that company id is include with post request
        if(request('company_id')){            
            // get company
            $company = Company::findorfail(request('company_id'));
            // create new contact
            $contact = new Contact(
                [                    
                    'first_name' => request('first_name'),
                    'last_name' => request('last_name'),                   
                    'phone' => request('phone'),
                    'email' => request('email'),
                    'ext' => request('ext'),
                    'title' => request('title')
                ]
            );

            $company->contacts()->save($contact);
            return redirect()->action(
                'CompanyController@show',
                [$company]
            );
        }
        else{
            return "Error";
        }        
    }

    /**
     * Display a specific contact.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $contact =  Contact::findOrFail($id);
        $company = Company::findOrFail($contact->company_id); //DB::table('companies')->where('id', '=', $contact->company_id)->get();
        $opentasks = DB::table('tasks')->where('contact_id', '=', $id)->where('status', '=', 0)->orderBy('due_date', 'desc')->get();
        $completedtasks = DB::table('tasks')->where('contact_id', '=', $id)->where('status', '=', 1)->orderBy('due_date', 'desc')->get();
 

        return view('dashboard.contact')->with(['company'=>$company])->with(['contact'=>$contact])->with(['opentasks'=>$opentasks])->with(['completedtasks'=>$completedtasks]);
        //return response()->json($contact); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Contact::findOrFail($id);
        $item->company;

        return view('dashboard.editcontact')->with(['editcontact'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Contact $contact)
    {
        $contact->update(request()->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'phone'=> 'required',            
        ]));
        
        return redirect()->action(
            'ContactController@show',
            [$contact->id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * create new contact that belongs to specific company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createcontact($id)    
    {       
        $company = Company::findOrFail($id);        

        return view('dashboard.createcontact')->with(['company'=>$company]);
        //return response()->json($company);
    }
}
