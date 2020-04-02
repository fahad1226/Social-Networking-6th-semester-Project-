@extends('layouts.app')


@section('content')
<div class="container py-2">
	<div class="row">
		<div class="col-md-6 offset-3">
			<h3 class="text-secondary">follwoing</h3>
			@foreach ($friends as $friend)
			<ul class="list-group">
				<li class="list-group-item">
				@if($friend->image)
				<a style="text-decoration:none;" href="{{ url('user/'.$friend->id) }}">
				<img class="rounded-circle d-inline" width="60" height="60" src=" {{ url('uploads/'.$friend->image) }} ">
				@else
				<img class="rounded-circle d-inline" width="60" height="60" src=" {{ url('default/default.jpg') }} ">
				@endif

					<strong class="pl-2"> {{ $friend->user->name }}</strong> </li>
				</a>
			</ul>
			@endforeach
			{{ $users->links() }}
		</div>
	</div>
</div>
@endsection


