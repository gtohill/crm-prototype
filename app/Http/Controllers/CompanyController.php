<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Company;
use App\Contact;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of all companies the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(auth()->user()->id)){
            
            // user id
            $user_id = auth()->user()->id;

            // get user details
            $user = User::findorfail($user_id);
            $companies = $user->companies;
          
            // $companies = Company::all();
            return view('companies')->with(['companies' => $companies ]);            
            
        }
        else{

            // if user is not logged in.
            return view('errors.loginrequired');
        }       
       
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.createcompany');
    }

    /**
     * Store a new company and store in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company(
            [                    
                'name' => request('name'),
                'address' => request('address'),                
                'phone' => request('phone'),
                'url' => request('url'),
            ]
        );

        $company->save();

        return redirect()->action('CompanyController@show', $company);

    }

    /**
     * Display a specific Company with contacts and tasks.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findorfail($id);
        $contacts =  DB::table('contacts')->where('company_id', '=', $id)->get();
        $opentasks = DB::table('tasks')->where('company_id', '=', $id)->where('status', '=', 0)->get();
        $completedtasks = DB::table('tasks')->where('company_id', '=', $id)->where('status', '=', 1)->get();

        return view('dashboard.company')->with(['company'=>$company])->with(['contacts'=>$contacts])->with(['opentasks'=>$opentasks])->with(['completedtasks'=>$completedtasks]);        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $company = Company::findOrFail($id);
       return view('dashboard.editcompany')->with(['company'=>$company]);

    }

    /**
     * Update the specified COMPANY in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company)
    {
        $company->update(request()->validate([
            'name'=> 'required',
            'address'=> 'required',           
            'phone'=> 'required',
            'url'=> 'required'
        ]));
        
        return redirect()->action(
            'CompanyController@show',
            [$company->id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $name = $company->name;
        $company->delete();

        return $name." deleted";
        
    }
}
