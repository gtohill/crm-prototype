@extends('dashboard.dashboard')

@section('tasks')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="pt-5">All Tasks</h3>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">View Task</th>                                       
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td><a href="/dashboard/company/task/{{$task->id}}">{{$task->id}}</a></td>
                        <td>{{$task->due_date}}</td>
                        <td>{{$task->description}}</td>                      
                    </tr>                  
                  @endforeach
                </tbody>
              </table>            
        </div>        
    </div>
</div>
@endsection