<?php

namespace App\Http\Controllers;

use App\Company;
use App\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(){
       
        return view('dashboard.dashboard');
    }

    /**
     * get all comapanies belonging to user
     */
    public function companies(){

        $companies = Company::all();

        return view('dashboard.companies')->with(['companies'=>$companies]);
    }

    /**
     * get all tasks belonging to user
     */
    public function tasks(){
        
        $tasks = Task::all();

        return view('dashboard.tasks')->with(['tasks'=>$tasks]);
    }
}
