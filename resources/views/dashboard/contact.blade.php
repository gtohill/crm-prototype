@extends('dashboard.dashboard')

@section('contact')
<div class="container">
@if($company)
    <h3 class="display-5 text-center p-5"><a href="/dashboard/company/{{$company->id}}">{{$company->name}}</a></h3>
    <table class="table table-bordered" style="border-top:rgb(175, 152, 18) solid 5px">    
        <tbody>
            <tr>
                <th scope="row">Company</th>
                <td>{{$company->name}}</td>        
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td>{{$company->address}}</td>
                
            </tr>           
            <tr>
                <th scope="row">Phone</th>
                <td colspan="2">{{$company->phone}}</td>
                
            </tr>
            <tr>
                <th scope="row">www</th>
                <td colspan="2"><a href="{{$company->url}}" target="_blank"> Visit Web Site</td>
            </tr>
        </tbody>
    </table>
    @endif   
    <div class="row pt-5">
        <h4>Employee</h4>
        <table class="table table-sm" style="border-top:rgb(175, 152, 18) solid 5px">
            <thead>
              <tr>               
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th> 
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>                
                <tr>
                    <td>{{$contact->first_name}}</td>   
                    <td>{{$contact->last_name}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->email}}</td>
                    <td><a href="/dashboard/company/contact/{{$contact->id}}/edit">Update</a></td>
                </tr>               
            </tbody>
          </table>

    </div>
    <div class="row pt-5">
        <div class="col-md-5">
            <h3>
                Tasks
                <span style="font-size: .75rem;">
                    <a href="/dashboard/company/task/createtask/{{$contact->id}}">
                        <i style="font-size: 12px;" class="fa fa-plus" aria-hidden="true"></i>
                    Create Task </a></span>

            </h3>
        </div>       
    </div>
    <div class="row pt-3">        
        <div class="col-md-2 ">
            <h6>Open Tasks</h6>
        </div>
    </div>
    <div class="row pt-2">
        <table class="table table-sm" style="border-top:rgb(175, 152, 18) solid 5px">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Due Date</th>
                <th scope="col">Description</th> 
                <th scope="col">View/Update</th>                
              </tr>
            </thead>
            <tbody>
                @foreach ($opentasks as $task)
                <tr>
                    <td>{{$task->id}}</td>   
                    <td>{{$task->due_date}}</td>
                    <td>{{$task->description}}</td>
                    <td><a href="/dashboard/company/task/{{$task->id}}">View/Update</a></td>
                </tr>             
                @endforeach
            </tbody>
          </table>
    </div>
    <div class="row pt-5">
        <h6>Completed Tasks</h6>
        <table class="table table-sm" style="border-top:rgb(175, 152, 18) solid 5px">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Due Date</th>
                <th scope="col">Description</th> 
                               
              </tr>
            </thead>
            <tbody>
                @foreach ($completedtasks as $completedtask)
                <tr>
                    <td>{{$completedtask->id}}</td>   
                    <td>{{$completedtask->due_date}}</td>
                    <td>{{$completedtask->description}}</td>
                    
                </tr>             
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
