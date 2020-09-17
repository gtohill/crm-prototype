@extends('dashboard.dashboard')

@section('create_contact')
<div class="container">
<h4>Create Contact for {{$company->name}}</h4>   
<h6><a href="/dashboard/company/{{$company->id}}">Back</a></h6> 
    <div class="row">
        <div class="col-md-8">
            <form action="/dashboard/company/contact" method="POST">
                @csrf
                <input type="hidden" name="company_id" value="{{$company->id}}" >
                <div class="form-group">
                    <label for="inputsm">First Name</label>
                    <input type="text" name="first_name" class="form-control input-sm" placeholder="Enter First Name">              
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
                </div>
                {{-- <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div> --}}
                <div class="form-group">
                    <label>Phone</label>
                    <input type="phone" name="phone" class="form-control" placeholder="Enter Phone">
                </div>
                {{-- <div class="form-group">
                    <label for="">Ext.</label>
                    <input type="text" name="ext" class="form-control" id="" placeholder="Enter Extension">
                </div> --}}
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="" placeholder="Enter Email">
                </div>
              
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create Contact">
                </div>
                
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            
        </div>
        <div class="col-6">
            @if($message ?? '')
                <div class="p-2 text-center bg-info text-white">
                    {{$message ?? ''}}
                </div>                
                @endif            
        </div>
    </div>   
  
</div>
@endsection