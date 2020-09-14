@extends('layouts.app')

@section('title', 'Companies')

@section('companies')

<ul>
    @foreach ($companies as $company)

    <li><a href="/company/{{$company->id}}">{{$company->name}}</a> </li>

    @endforeach
    <br>
</ul>

@endsection