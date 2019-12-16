{{--  @extends('layouts.app')  --}}

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href=" {{ asset('custom-css/user_profile.css') }} ">
 <body>
	<div class="main-content">
	<!-- Top navbar -->
		 <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
			<div class="container-fluid">
				
				<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href=" {{ url('posts') }}">Home</a>
				<!-- User -->
				 <ul class="navbar-nav align-items-center d-none d-md-flex">
					<li class="nav-item dropdown">
						<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div class="media align-items-center">
								<span class="avatar avatar-sm rounded-circle">
									<img src="{{ url('uploads/'.$profile->image) }}">
								</span>
								<div class="media-body ml-2 d-none d-lg-block">
									<span class="mb-0 text-sm  font-weight-bold">  </span>
								</div>
							</div>
						</a>

					</li>
				</ul>
			</div>
		</nav>   