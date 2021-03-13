@extends('dashboard.dashboard')

@section('companies')
<div class="container">
   
    <div class="row">
        <div class="col-md-12">
            <h3 class="pt-5">
              All Companies
              <span style="font-size: .75rem;"><a href="/dashboard/company/create"> <i style="font-size: 12px;" class="fa fa-plus" aria-hidden="true"></i>
                Create Company </a></span>
            </h3>
            <table class="table table-hover" >
                <thead>
                  <tr>                 
                    <th scope="col">Company</th>
                    <th scope="col">Address</th>
                    <th scope="col">Website</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody style="border-top:rgb(175, 152, 18) solid 5px">
                    @foreach($companies as $company)
                  <tr>                    
                    <td><a href="/dashboard/company/{{$company->id}}">{{$company->name}}</a></td>
                    <td>{{$company->address}}</td>
                    <td><a href="http://{{$company->url}}">{{$company->url}}</a></td>
                    <td>{{$company->phone}}</td>                    
                  </tr>
                  @endforeach                 
                </tbody>
              </table>
            <ul class="pt-2">                
                <br>
            </ul>
        </div>
        
    </div>
</div>
@endsection