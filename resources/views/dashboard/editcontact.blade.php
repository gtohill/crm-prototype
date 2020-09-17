@extends('dashboard.dashboard') 
@section('edit_contact')
<div class="container">
    <div class="row">
        <h3 class="p-3 text-center"><a href="/dashboard/company/{{$editcontact->company->id}}">{{$editcontact->company->name}}</a></h3>
    </div>
    
    @if($message ?? '')
    <div class="alert alert-success" role="alert">
        {{$message ?? ''}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <form action="/dashboard/company/contact/{{$editcontact->id}}"  method="POST">
                @method('PUT')
                @csrf                
                <div class="form-group">
                    <label for="inputsm">First Name</label>
                    <input type="text" name="first_name" class="form-control input-sm" value="{{$editcontact->first_name}}">              
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{$editcontact->last_name}}" >
                </div>
                {{-- <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{$editcontact->title}}" >
                </div> --}}
                <div class="form-group">
                    <label>Phone</label>
                    <input type="phone" name="phone" class="form-control" value="{{$editcontact->phone}}" >
                </div>
                {{-- <div class="form-group">
                    <label for="">Ext.</label>
                    <input type="text" name="ext" class="form-control" id="" value="{{$editcontact->ext}}" >
                </div> --}}
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="" value="{{$editcontact->email}}" >
                </div>
            
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update Contact">
                </div>                
            </form>
        </div>
    </div>
</div>
@endsection
