@extends('layouts.app')

@section('content')
	<div class="container">
		<h3 class="text-primary">Edit Post</h3>

		<form method="post" action=" {{ url('post/update/'.$post->id) }} ">
			@method('PATCH')
			@csrf
			<div class="form-group">
			<label>Post</label>
			<textarea class="form-control" name="caption"> {{ $post->caption }} </textarea>
			</div>
			<button class="btn btn-primary" type="submit" >Update</button>
		</form>
	</div>
@endsection