@extends('dashboard.dashboard')

@section('tasks')
<div class="container" >
    <div class="row" >
        <div class="col-md-12" >
            <h3 class="pt-5 text-center">All Active Tasks</h3>

            <table class="table" style="border-top:rgb(175, 152, 18) solid 5px">
                <thead>
                  <tr>
                    <th scope="col">Date / View </th>                                       
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Description</th>                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td><a href="/dashboard/company/task/{{$task->id}}">{{$task->due_date}}</a></td>
                        <td>{{$task->first_name}}</td> 
                        <td>{{$task->last_name}}</td> 
                        <td>{{$task->description}}</td>                         
                    </tr>                  
                  @endforeach
                </tbody>
              </table>            
        </div>        
    </div>
</div>
@endsection