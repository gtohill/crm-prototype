@extends('dashboard.dashboard') 
@section('edit_company')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="pt-5 text-center"><span style="font-size:.75em"><i>edit</i> </span><a href="/dashboard/company/{{$company->id}}">{{$company->name}}</a></h3>
        </div>
    </div>
    
    @if($message ?? '')
    <div class="alert alert-success" role="alert">
        {{$message ?? ''}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="/dashboard/company/{{$company->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="inputsm">Company Name</label>
                <input type="text" name="name" class="form-control input-sm" value="{{$company->name}}">              
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{$company->address}}">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" value="{{$company->city}}">
                </div>
                <div class="form-group">
                    <label for="">State/Prov</label>
                    <input type="text" name="prov" class="form-control" id="" value="{{$company->prov}}">
                </div>
                <div class="form-group">
                    <label for="">PC/Zip</label>
                    <input type="text" name="pc" class="form-control" id="" value="{{$company->pc}}">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" id="" value="{{$company->phone}}">
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="url" class="form-control" id="" value="{{$company->url}}">
                </div> 
                <div class="form-group">

                    <input type="submit" class="btn" style="background-color:#2992b0; color:white" value="Update Company">
                </div>                
            </form>
        </div>
    </div>
</div>
@endsection
