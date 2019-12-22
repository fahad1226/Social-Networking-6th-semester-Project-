@extends('layouts.app')


@section('content')
	
    <div class="container">
         <div class="jumbotron text-center">
             <h1 class="display-4 ">Develop Your Social Network</h1>
             @if(Auth::check())
             <a class="btn btn-primary btn-lg" href="{{ url('posts') }} ">
             	thanks for using <strong>LinkedUp</strong>
             </a> <br>
             @endif
             @if(!Auth::check())
             <a class="btn btn-primary btn-lg" href=" {{ url('login') }} ">Login</a>
             <a class="btn btn-secondary btn-lg" href="{{ url('register') }}">Registration</a> <br>

             <h3>or</h3>
             <a class="btn btn-primary btn-lg" href=" {{ url('posts') }} ">Visit <strong>LinekdUp</strong></a>
             @endif
         </div>
    </div>
    
@endsection
