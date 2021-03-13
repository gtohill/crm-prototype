@extends('dashboard.dashboard')

@section('create_company')
<div class="container" >
    
    <div class="row">
        <div class="col-md-12 pt-5">
            <h4 class="text-center">Create Company</h4>    
        </div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 p-5" style="background-color:rgb(199, 194, 194)">
            <form action="/dashboard/company" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputsm">Company Name</label>
                    <input type="text" name="name" class="form-control input-sm" required>              
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" name="city" class="form-control" id="city" required>
                </div>               
                <div class="form-group">
                    <label for="">ZIP/Postal Code</label>
                    <input type="text" name="pc" class="form-control" id="pc" required>
                </div>               
                <div class="form-group">
                    <label for="">State/Province</label>
                    <input type="text" name="prov" class="form-control" id="prov" required>
                </div>               
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" onchange="formatPhoneNumber()" required>
                </div>
                <div id="phone-message"></div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="url" class="form-control" id="" required>
                </div> 
                <div class="form-group">
                    <input type="submit" class="btn" style="background-color:#2992b0; color:white" value="Create Company">
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

<script>
    function formatPhoneNumber() {
        let x =  document.getElementById('phone').value;
        console.log(x);
        var cleaned = ('' + x).replace(/\D/g, '')
        var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/)
        if (match) {
            document.getElementById('phone').value = '(' + match[1] + ') ' + match[2] + '-' + match[3];
            document.getElementById('phone-message').style.display = "none";
        }else{
            document.getElementById('phone-message').style.display = "inline";
            document.getElementById('phone-message').style.color = "red";
            document.getElementById('phone-message').innerHTML = "please enter a valid 7 digit phone number";
        }
    }    
        
    </script>
@endsection