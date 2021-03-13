@extends('dashboard.dashboard')

@section('welcome')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 pt-5 text-center">
            <h4>Active Tasks To Complete</h4>
            <h6 class="pt-3">You have <a href="/dashboard/tasks"> {{$number_of_open_tasks}}</a> of active tasks</h6>
            <h6 class="pt-3"><a href="/dashboard/tasks"> view active tasks</a> </h6>
        </div>
    </div>
</div>
    
@endsection