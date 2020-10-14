@extends('dashboard.dashboard')

@section('query_results')
<div class="container">
    <div class="row">
        <div class="col- pt-5">

            <h4>Query Results</h4>
            @if($message ?? '')
            <div class="alert alert-warning" role="alert">
                {{$message ?? ''}}
            </div>
            @endif
            @if($companies ?? '')
            <h6 class="pt-3">Companies</h6>
            
            @foreach($companies as $company)
            
            <a href="/dashboard/company/{{$company->id}}">{{$company->name}}</a>
            
            @endforeach
            @endif
            @if($contacts ?? '')
            <h6 class="pt-3">Contacts</h6>
            
            @foreach($contacts as $contact)
            
            <a href="/dashboard/company/contact/{{$contact->id}}">{{$contact->first_name}}  {{$contact->last_name}}</a>
            
            @endforeach  
            @endif  
            
        </div>
    </div>
</div>
    @endsection