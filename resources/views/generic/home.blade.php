@extends('layouts.master')

@section('content')

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <div class="row pt-1">  
        <div class="col-md-12 hero_nueph" style="padding: 0 0;">
          <img src="/images/add_purpose_hero.png" alt="" style="border-radius:10px"  width="100%" height="100%">    
          <div class="hero-text" style="color:#fcf8e8; padding:10px 0">
            <h1><b>Pivotal CRMs</b></h1>
            <h2><b>Add Purpose To Your Client Interactions</b></h2>
            <p><a class="btn btn-lg" style="background-color: #c2ad3a" href="{{ route('register') }}" role="button">Get Started &raquo;</a></p>
          </div>            
        </div>      
      </div>
      <div style="height:50px">        
      </div>
      <div class="row">
        <div class="container">          
          <div class="col-md-12 border-top">
            <div style="height:50px">        
            </div>
            <h3 class="text-center">Thank you for visiting Pivotal CRMs</h3>
            <h5>Since you're here, take a few minutes try our no obligation demonstration of our easy to use Client Relationship Management System. Please <a href="mailto:info@pivotaldesign.ca">Send Us An Email</a> and we will provide a user name and password.</h5>
            <h5>Doing so will save you time and give you access to pre-built simulated CRMs. We fill the database with pseudo companies, contacts, and tasks. Please  make any changes you like.</h5>             
            <h4>Please note we <b>RESET</b> the CRM every Thursday at ~ midnight (11:50pm).</h4>
          </div>
        </div>
      </div>
      <div style="height:50px">        
      </div>
    </div>
    @include('generic.footer')
  @endsection