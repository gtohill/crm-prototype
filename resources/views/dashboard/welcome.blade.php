@extends('dashboard.dashboard')

@section('welcome')

<div class="container">
    <div class="row">
        <div class="col- pt-5">
            <h4>Tasks To Complete</h4>
            <h6 class="pt-3">You have <a href="/dashboard/tasks"> {{$number_of_open_tasks}}</a> of open tasks</h6>
        </div>
    </div>
</div>
    
@endsection