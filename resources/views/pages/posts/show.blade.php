@extends('layouts.app')

@section('content')

    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
                @if (Auth::check())
                <div class="card">
                   
                    <div class="card-body">
                        <div class="h5"> <a href=" {{ url('user/'.auth()->user()->id.'/') }} ">{{ auth()->user()->name }}</a> </div>
                        <div class="h7"> {{ auth()->user()->email }} 
                    </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">Followers</div>
                            
                            <div class="h5"> {{ auth()->user()->profile->followers->count() }} 
                            </div>
                            
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Following</div>
                            <div class="h5">{{ auth()->user()->following->count() }}</div>
                        </li>
                       
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-md-6">

                @if (session()->has('msg'))
                    <div class="alert alert-success">
                        <strong>{{ session()->get('msg') }}</strong> 
                    </div>
                @endif

                @include('pages.posts.post_box')
               
                @include('pages.posts.post')
                
            </div>
            @if(Auth::check())
            <div class="col-md-3">
                <h4>Follow More Users</h4>
                <ul class="list-group">
                    @foreach ($followusers as $user)
                        
                        <a href=" {{ url('user/'.$user->id) }} ">
                           <li class="list-group-item">
                           @if($user->user->profile->image) 
                            <img class="rounded-circle" height="40px" width="40px" src="{{ url('uploads/'.$user->user->profile->image) }}">
                            @else
                            <img class="rounded-circle" height="40px" width="40px" src=" {{ url('default/default.jpg') }} " >
                            @endif

                            {{ $user->user->name ??  'n/a'}}</li>  
                        </a>
                       
                    
                    @endforeach
                   
                </ul>
            </div>
            @endif
        </div>
    </div>


@endsection
