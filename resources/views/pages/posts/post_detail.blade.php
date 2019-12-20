@extends('layouts.app')

@section('content')
<div class="container py-3">

	<link rel="stylesheet" type="text/css" href=" {{ asset('custom-css/comments.css') }} ">

	<div class="row">
		<div class="card col-md-8 offset-2 ">
			<div class="card-header">

				<div class="d-flex justify-content-between align-items-center">
					<div class="d-flex justify-content-between align-items-center">

						<div class="mr-2">
							<img class="rounded-circle" width="45" src="{{ url('uploads/'.$post->user->profile->image) }} "  alt="">
						</div>
						<div class="ml-2">

							<div class="h5 m-0 "> <a style="text-decoration:none;" href=" {{ url('user/'.$post->user->id) }} ">

								{{ $post->user->name }}
							</a> 

						</div> 
						<small class="d-inline justify-content-start"> {{ $post->created_at->diffForHumans() }} </small>
					</div>

				</div>

			</div>

		</div>
		<div class="card-body">


			<div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>  </div>

			<div>
				
				<p class="card-text">
					{{ $post->caption  }}
				</p>

				@if($post->img == true)

				<img class="polaroid" height="400" width="550" src="{{ url('uploads/thumbnail/'.$post->img) }} ">

				@endif 

			</div>

		</div>
		<div>
			<hr>





			<div class="page-header">
				<h4>Comments</h4>
			</div> 
			<div class="comments-list">

				@foreach ($post->comments as $comment)
				<div class="media">

					<a class="media-left " href="#">
						<img class="rounded-circle" height="50px" width="50px" src="{{ url('uploads/'.$comment->user->profile->image) }}">
					</a>
					<div class="media-body px-2">
						<p class="float-md-right"><small> {{ $comment->created_at->diffForHumans() }} </small></p>
						<h4 class="media-heading user_name"> {{ $comment->user->name }} </h4>

						{{ $comment->body }}

						<p><small><a href="">Like</a> - <a href="">replay</a></small></p>
					</div>
				</div>
				@endforeach

			</div>

		</div>
		@if(Auth::check())
		<strong>Share Your Thoughts</strong>

		<div class="card-block">
			<form action=" {{ url('post/'.$post->id.'/comment') }} " method="POST">
				@csrf
				
				<div class="form-group">
					<textarea name="body" placeholder="Your Comment Here!" class="form-control"></textarea>
					
				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Comment">
				</div>
				
			</form>
		</div>

		@endif
	</div>
</div>
</div>

@endsection