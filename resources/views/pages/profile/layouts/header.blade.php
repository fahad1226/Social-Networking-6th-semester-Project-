<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://images.pexels.com/photos/1546901/pexels-photo-1546901.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940); background-size: cover; background-position: center top;">
	<!-- Mask -->
	<span class="mask bg-gradient-default opacity-8"></span>
	<!-- Header container -->
	<div class="container-fluid  align-items-center">
		<div class="row">
			<div class="col-lg-7 col-md-10">
				<h1 class="display-2 text-white"> {{ $profile->user->name }} </h1>
				<p class="text-white mt-0 mb-5">  </p>
				@can('update',$profile)
				<a href=" {{ url('user/'.$profile->id.'/edit') }} " class="btn btn-info">Edit profile</a>
				@endcan
			</div>
		</div>
	</div>
</div>

