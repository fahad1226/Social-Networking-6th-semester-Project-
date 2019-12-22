<body>
	<div  class="main-content">
		<div class="container mt-7">
			
			<div class="row">
				<div class="col-xl-8 m-auto order-xl-2 mb-5 mb-xl-0">
					<div class="card card-profile shadow">
						<div class="row justify-content-center">
							<div class="col-lg-3 order-lg-2">
								<div class="card-profile-image">
									@if($profile->image)
									<a href="#">
									<img src="{{ url('uploads/'.$profile->image) }} " class="rounded-circle">
									</a>
									@else 
										<img class="rounded-circle" src=" {{ url('default/default.jpg') }} " alt="default image">
									@endif
								</div>
							</div>
						</div>
						<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
							<div id="app1" class="d-flex justify-content-between">
								<follow-component user-id="{{ $profile->user_id }}" follows="{{ $follows }}"></follow-component>
								<a href=" {{ url('user/'.$profile->id.'/timeline') }} " class="btn btn-lg btn-default float-right">Timeline</a>
							</div>
						</div>
						<div class="card-body pt-0 pt-md-4">
							<div class="row">
								<div class="col">
									<div class="card-profile-stats d-flex justify-content-center mt-md-5">
										<div>
											<span class="heading"> {{ $profile->followers->count() }} </span>
											<span class="description"><strong>Followers</strong></span>
										</div>
										<div>
											<span class="heading"> {{ $profile->user->following->count() }} </span>
											<a href=" {{ url('user/'.$profile->id.'/friends') }} ">
												<span class="description"><strong>Following</strong></span>
											</a>
										</div>
										<div>
											<span class="heading"> {{ $profile->user->posts->count() }} </span>
											<span class="description"><strong>Posts</strong></span>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center">
								<h3>
								 {{ $profile->user->name }}	<span class="font-weight-light"></span>
								</h3>
								<div class="h5 font-weight-300">
									<i class="ni location_pin mr-2"></i>
									{{ $profile->user->email }}
								</div>
								<div class="h5 mt-4">
									<i class="ni business_briefcase-24 mr-2"></i> 
									{{ $profile->description }}
								</div>
								<div>
									<i class="ni education_hat mr-2"></i>
									{{ $profile->info }}
								</div>
								<hr class="my-4">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
 <script src="{{ asset('js/app.js') }}" defer></script>
