<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
	<!-- Mask -->
	<span class="mask bg-gradient-default opacity-8"></span>
	<!-- Header container -->
	<div class="container-fluid  align-items-center">
		<div class="row">
			<div class="col-lg-7 col-md-10">
				
					<h1 class="display-2 text-white"> {{ $profile->user->name }} </h1>
					<p class="text-white mt-0 mb-5">  </p>
					<a href=" {{ url('user/'.$profile->id.'/edit') }} " class="btn btn-info">Edit profile</a>
			</div>
		</div>
	</div>
</div>