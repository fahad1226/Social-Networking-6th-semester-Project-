@extends('layouts.app')

@section('content')
<div class="container py-3">

	<div class="row">
		<div class="card gedf-card col-md-6 offset-3">
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
		<h4>Comments</h4>
		<article>
			@foreach ($post->comments as $comment)
			{{ $comment->body }}
			@endforeach
				
		</article>	
	</div>
	<strong>Share Your Thoughts</strong>


	<div class="card">
		<div class="card-block">
			<form>
				<div class="form-group">
					<textarea name="body" placeholder="Your Comment Here!" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Comment">
				</div>
			</form>
		</div>
	</div>
		
	</div>
	
</div>

</div>

@endsection