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
                    <input type="text" name="name" class="form-control input-sm" placeholder="Enter Company Name" required>              
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                </div>               
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" onchange="formatPhoneNumber()" placeholder="Enter Phone" required>
                </div>
                <div id="phone-message"></div>
                <div class="form-group">
                    <label for="">www</label>
                    <input type="text" name="url" class="form-control" id="" placeholder="Enter web address" required>
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