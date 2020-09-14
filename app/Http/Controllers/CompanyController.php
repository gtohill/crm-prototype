<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Company;
use App\Contact;
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
        $companies = Company::all();

        return view('companies')->with(['companies' => $companies ]);
        //return response()->json($companies);

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
                'city' => request('city'),
                'prov' => request('prov'),
                'pc' => request('pc'),
                'phone' => request('phone'),
                'url' => request('url'),
            ]
        );

        $company->save();

        return response()->json($company);

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
        $tasks = DB::table('tasks')->where('company_id', '=', $id)->get();
        // $co = $company;
        // $contacts = $company->contacts;
        // $tasks = $company->tasks;
        // $company->contacts;
        // $company->tasks;
        return response()->json([$company, $contacts, $tasks]);         
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
       //

    }

    /**
     * Update the specified COMPANY in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->name = request('name');
        $company->address = request('address');
        $company->city = request('city');
        $company->prov = request('prov');
        $company->pc = request('pc');
        $company->url = request('url');
        $company->phone = request('phone');

        $company->save();

        return response()->json($company);

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
