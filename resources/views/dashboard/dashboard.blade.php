@extends('layouts.master')

@section('content')
<div class="container">
@include('inc.subnav')
</div>
<div class="container" style="height:100vh">   
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
    @yield('query_results')      
</div>
@endsection