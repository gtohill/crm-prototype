@extends('dashboard.dashboard')

@section('company')
<div class="container">
    @if($company)
    <div class="row">
        <div class="col-md-12 pt-5">
            <h3 class="text-center p-2">{{$company->name}}</h3>
            <table class="table table-bordered" style="border-top:rgb(175, 152, 18) solid 5px">
                <tbody>
                    <tr>
                        <th scope="row">Company</th>
                        <td>{{$company->name}} <a href="/dashboard/company/{{$company->id}}/edit">edit<a></td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td>{{$company->address}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td colspan="2">{{$company->phone}}</td>
                    </tr>
                    <tr>
                        <th scope="row">www</th>
                        <td colspan="2"><a href="{{$company->url}}" target="_blank"> Visit Web Site</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
    

    <div class="row py-5">
        <h4>Contact <span style="font-size: .75rem;"><a href="/dashboard/company/contact/createcontact/{{$company->id}}"> <i style="font-size: 12px;" class="fa fa-plus" aria-hidden="true"></i>
            Create Contact </a></span></h4>
        <table class="table table-sm" style="border-top:rgb(175, 152, 18) solid 5px">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{$contact->first_name}}</td>
                    <td>{{$contact->last_name}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->email}}</td>
                    <td><a href="/dashboard/company/contact/{{$contact->id}}">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="row border-top">
        <h4>Tasks</h4>
    </div>
    <div class="row pt-2">
        <h6>Open Tasks</h6>
        <table class="table table-sm" style="border-top:rgb(175, 152, 18) solid 5px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">View/Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opentasks as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->due_date}}</td>
                    <td>{{$contact->description}}</td>
                    <td><a href="/dashboard/company/task/{{$contact->id}}">View/Update</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row pt-5">
        <h6>Completed Tasks</h6>
        <table class="table table-sm" style="border-top:rgb(175, 152, 18) solid 5px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Description</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($completedtasks as $completedtask)
                <tr>
                    <td>{{$completedtask->id}}</td>
                    <td>{{$completedtask->due_date}}</td>
                    <td>{{$completedtask->description}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection