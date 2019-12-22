@extends('layouts.app')

@section('content')
<div class="container py-3">
	<h3 class="display-4 text-center">Edit Post</h3>
		
	<div class="row">
		<div class="col-md-6 offset-3">

			<form method="post" action=" {{ url('post/update/'.$post->id) }} ">
				@method('PATCH')
				@csrf
				<div class="form-group">
					<label>Post</label>
					<textarea rows="6" cols="50" class="form-control" name="caption"> {{ $post->caption }} </textarea>
				</div>
				<button class="btn btn-primary" type="submit" >Update</button>
			</form>
		</div>
	</div>
</div>
@endsection