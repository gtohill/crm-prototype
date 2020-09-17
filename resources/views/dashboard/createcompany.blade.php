@extends('dashboard.dashboard')

@section('create_company')
<div class="container">
    <h4>Create Company</h4>    
    <div class="row">
        <div class="col-md-8">
            <form action="/dashboard/company" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputsm">Company Name</label>
                    <input type="text" name="name" class="form-control input-sm" placeholder="Enter Company Name">              
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" placeholder="Enter City">
                </div>
                <div class="form-group">
                    <label for="">State/Prov</label>
                    <input type="text" name="prov" class="form-control" id="" placeholder="Enter Prov/State">
                </div>
                <div class="form-group">
                    <label for="">PC/Zip</label>
                    <input type="text" name="pc" class="form-control" id="" placeholder="Enter PC">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" id="" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="">www</label>
                    <input type="text" name="url" class="form-control" id="" placeholder="Enter web address">
                </div> 
                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Create Company">
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