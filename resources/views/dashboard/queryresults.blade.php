@extends('dashboard.dashboard')

@section('query_results')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col- pt-5">

            <h4>Query Results</h4>
            @if($message ?? '')
            <div class="alert alert-warning" role="alert">
                {{$message ?? ''}}
            </div>
            @endif

            <table class="table table-hover" >
                <thead>
                  <tr>                 
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                  </tr>
                </thead>              

            @if(count($companies) > 0)
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
           
            
            @elseif(count($contacts) > 0)
            <tbody style="border-top:rgb(175, 152, 18) solid 5px">                
                @foreach($contacts as $contact)
                <tr>                    
                    <td><a href="/dashboard/company/contact/{{$contact->id}}">{{$contact->first_name}}</a></td>
                    <td>{{$contact->last_name}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->name}}</td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
            @else
                <h5>Nothing matched your search criteria</h5>
            @endif
                           
        </div>
    </div>
</div>
    @endsection