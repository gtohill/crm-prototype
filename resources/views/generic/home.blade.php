@extends('layouts.master')

@section('content')
<main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container text-center">
        <h1 class="display-4 ">Pivotal CRMS</h1>
        <p>Build Trust, Credibility To Grow</p>
        <p><a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Get Started &raquo;</a></p>
      </div>
    </div>

  </main>
  @endsection