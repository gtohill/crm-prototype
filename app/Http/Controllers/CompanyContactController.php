<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Company;
use App\Contact;
use App\Task;
use Illuminate\Http\Request;

class CompanyContactController extends Controller
{
    /**
     * API response with company details, all contacts and all open and closed tasks
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function company_details($id)
    {

        $company = Company::findorfail($id);
        $company->contacts;
        $company->tasks;

        return response()->json($company);
    }

    /**
     * API response with contact details, all contacts and all open and closed tasks
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function contact_details($id)
    {

        $contact = Contact::findorfail($id);
        $contact->company;
        $contact->tasks;

        return response()->json($contact);
    }


    /**
     * API response with contact details, and all open and closed tasks
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function task_details($id)
    {

        $task = Task::findorfail($id);
        $task->company;
        $task->contact;

        return response()->json($task);
    }
}
