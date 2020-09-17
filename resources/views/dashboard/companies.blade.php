@extends('dashboard.dashboard')

@section('companies')
<div class="container">
    <a href="/dashboard/company/create">Create Company</a>
    <div class="row">
        <div class="col-md-5">
            <h3 class="pt-5">All Companies</h3>
            <ul class="pt-2">
                @foreach ($companies as $company)
                
                <li>
                    <a href="/dashboard/company/{{$company->id}}">{{$company->name}}</a>
                </li>
                
                @endforeach
                <br>
            </ul>
        </div>
        
    </div>
</div>
@endsection