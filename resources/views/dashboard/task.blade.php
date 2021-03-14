@extends('dashboard.dashboard')
@section('task')
<div style="height:50px"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12" >
            <h3 class="p-3 text-center"><a href="/dashboard/company/{{$item->company->id}}">{{$item->company->name}}</a>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <table class="table"  style="border-top:rgb(175, 152, 18) solid 5px;">
                <thead>
                    <tr>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a
                                href="/dashboard/company/contact/{{$item->contact->id}}">{{$item->contact->first_name}}</a>
                        </td>
                        <td>{{$item->contact->last_name}}</td>
                        <td>{{$item->contact->phone}}</td>
                        <td>{{$item->contact->email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if($message ?? '')
    <div class="alert alert-success" role="alert">
        {{$message ?? ''}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">

            <form action="/dashboard/company/task/{{$item->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Due Date</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="due_date"
                        value="{{$item->due_date}}" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5"
                        cols="100">{{$item->description}}
                </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <option value="0" {{$item->status == 0 ? 'selected': ''}}>Open</option>
                        <option value="1" {{$item->status == 1 ? 'selected': ''}}>Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection