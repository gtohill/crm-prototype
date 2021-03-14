<?php

namespace App\Http\Controllers;

use App\Company;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

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
        if (isset(auth()->user()->id)) {
            // user id
            $user_id = auth()->user()->id;
            $user = User::findorfail($user_id);
            // get the number of open tasks for this user id
            $num = $user->tasks()->where('status', '=', 0)->count();
            return view('dashboard.welcome')->with(['number_of_open_tasks' => $num]);
        }
    }

    /**
     * get all comapanies belonging to user
     */
    public function companies()
    {
        if (isset(auth()->user()->id)){
            $user_id = auth()->user()->id;
            $user = User::findorfail($user_id);
            $user->companies;            
            return view('dashboard.companies')->with(['companies' => $user]);
        }
    }

    /**
     * get all tasks belonging to user
     */
    public function tasks(){

        if(isset(auth()->user()->id)){
            $user_id = auth()->user()->id;
            $active_task = DB::table('tasks')
            ->select('tasks.id', 'tasks.due_date', 'tasks.status', 'tasks.description', 'contacts.first_name', 'contacts.last_name')
            ->join('contacts', 'contacts.id', '=', 'tasks.contact_id')
            ->where([['tasks.status', '=', 0], ['tasks.user_id', '=', $user_id]])
            ->orderBy('tasks.due_date', 'asc')
            ->get();
            
            return view('dashboard.tasks')->with(['tasks' => $active_task]);
        }
    }
}
