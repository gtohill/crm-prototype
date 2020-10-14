<?php

namespace App\Http\Controllers;

use App\Company;
use App\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function dashboard()
    {

        return view('dashboard.dashboard');
    }

    public function welcome()
    {
        $number_of_open_tasks = Task::all()->where('status', '=', 0)->count();
        return view('dashboard.welcome')->with(['number_of_open_tasks' => $number_of_open_tasks]);
    }

    /**
     * get all comapanies belonging to user
     */
    public function companies()
    {

        $companies = Company::all();

        return view('dashboard.companies')->with(['companies' => $companies]);
    }

    /**
     * get all tasks belonging to user
     */
    public function tasks()
    {

        $tasks = Task::all()->where('status', '=', 0)->sortBy('due_date');

        return view('dashboard.tasks')->with(['tasks' => $tasks]);
    }
}
