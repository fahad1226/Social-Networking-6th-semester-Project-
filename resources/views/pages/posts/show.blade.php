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
                            <div class="h5"> {{ auth()->user()->profile->followers->count() }} </div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Following</div>
                            <div class="h5">{{ auth()->user()->following->count() }}</div>
                        </li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-md-6 gedf-main">

                @include('pages.posts.post_box')
               
                @include('pages.posts.post')
                
            </div>
            @if(Auth::check())
            <div class="col-md-3">
                <h4>Follow More Users</h4>
                <ul class="list-group">
                    @foreach ($followusers as $user)
                        <li class="list-group-item"> {{ $user->user->name ??  'n/a'}}</li> 
                    @endforeach
                   
                </ul>
            </div>
            @endif
        </div>
    </div>


@endsection
