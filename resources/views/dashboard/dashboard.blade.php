@extends('layouts.master')

@section('content')
<div class="container">
@include('inc.subnav')
</div>
<div class="container">
    <div class="row">
        @yield('dashhome')
        @yield('companies')
        @yield('tasks')
        @yield('company')
        @yield('welcome')
        @yield('task')
        @yield('create_task')
        @yield('create_company')
        @yield('create_contact')
        @yield('contact')
        @yield('edit_contact')
        @yield('edit_company')
    </div>
</div>

@endsection