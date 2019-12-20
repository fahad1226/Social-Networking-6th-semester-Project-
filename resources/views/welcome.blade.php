@extends('layouts.app')


@section('content')
    <div class="container">
         <div class="jumbotron text-center">
             <h1 class="display-4 ">Develop Your Social Network</h1>
             <a class="btn btn-primary btn-lg" href=" {{ url('login') }} ">Login</a>
             <a class="btn btn-secondary btn-lg" href="{{ url('register') }}">Registration</a>
         </div>
    </div>
@endsection
