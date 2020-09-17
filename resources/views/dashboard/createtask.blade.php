@extends('dashboard.dashboard')

@section('create_task')
<div class="container">
    <h4>{{$createtask->company->name}}</h4>
    <h6><a href="/dashboard/company/{{$createtask->company->id}}">Back</a></h6> 
    <div class="text-center display-4 m-5">Create Task</div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="/dashboard/company/task" method="POST">
                @csrf
                  <input type="hidden" name="contact_id" value="{{$createtask->id}}">                
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Select Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">                     
                        <option value="0">Open</option>                          
                        <option value="1">Completed</option>                                               
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Due Date</label>
                    <input
                        type="date"
                        class="form-control"
                        id="exampleFormControlInput1"
                        name="due_date"
                        />
                </div>               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Task Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2"></label>
                    <input type="submit" class="form-control btn-success" id="formGroupExampleInput2"
                        value="Create Task">
                </div>
            </form>
        </div>
       


    </div>
    <div class="row">
        <div class="col-3">
            
        </div>
        <div class="col-6">
            <div class="p-2 text-center bg-info text-white">
                @if($message ?? '')
                    {{$message ?? ''}}
                @endif            
            </div>                
        </div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="text-center pt-5">
            <a class="h3 text-center" href="/dashboard/company/contact/{{$createtask->id}}">Back To {{$createtask->first_name}} {{$createtask->last_name}}</a>
            </div>
            
        </div>        
    </div>
</div>
@endsection