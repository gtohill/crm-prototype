<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    /**
     * Query a specific or multiple resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request     * 
     * @return \Illuminate\Http\Response
     */
    public function searchQuery(Request $request)
    {
        if (empty(request('find'))) {
            return view('dashboard.queryresults')->with(['message' => 'No Search Matches The Criteria']);
        } else {


            $companies = DB::table('companies')
                ->where('name', 'like', request('find') . '%')
                ->get();

            $contacts = DB::table('contacts')
                ->where('first_name', 'like', request('find') . '%')
                ->get();

            return view('dashboard.queryresults')->with(['companies' => $companies])->with(['contacts' => $contacts]);
        }
    }
}