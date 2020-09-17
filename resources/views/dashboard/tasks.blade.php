@extends('dashboard.dashboard')

@section('tasks')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3 class="pt-5">All Tasks</h3>
            <ul class="pt-2">
                @foreach ($tasks as $task)
                
                <li>
                    <a href="/company/{{$task->id}}">{{$task->description}}</a>
                </li>
                
                @endforeach
                <br>
            </ul>
        </div>
        
    </div>
</div>
@endsection