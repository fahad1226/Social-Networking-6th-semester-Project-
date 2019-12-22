
@include('pages.profile.layouts.navbar')
@include('pages.profile.layouts.header')


<div class="col-xl-8 order-xl-1 offset-2">
	<div class="card bg-secondary shadow">
		<div class="card-header bg-white border-0">
			<div class="row align-items-center">
				<div class="col-8">
					<h3 class="mb-0">Update Information</h3>
				</div>
				<div class="col-4 text-right">
					<a href="#!" class="btn btn-sm btn-primary">Settings</a>
				</div>
			</div>
		</div>
		<div class="card-body">

		{{-- 	profile updating task --}}

			<form action="{{ url('user/'.$profile->id.'/update') }}" enctype="multipart/form-data" method="POST">
				@method('PATCH')
				@csrf
				<h6 class="heading-small text-muted mb-4">User information</h6>
				<div class="pl-lg-4">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group focused">
								<label class="form-control-label" for="input-first-name">First name</label>
								<input type="text" name="fname" class="form-control form-control-alternative" placeholder="First name" value=" {{ $profile->fname ? : 'N/A' }} ">
							</div>
							<div> {{ $errors->first('fname') }} </div>
						</div>
						<div class="col-lg-6">
							<div class="form-group focused">
								<label class="form-control-label" for="input-last-name">Last name</label>
								<input type="text" name="lname"  class="form-control form-control-alternative" placeholder="Last name" value=" {{ $profile->lname ? : 'N/A' }} ">
							</div>
							<div> {{ $errors->first('lname') }} </div>
						</div>
					</div>
				</div>
				<hr class="my-4">
				<!-- Address -->
				<h6 class="heading-small text-muted mb-4">Contact information</h6>
				<div class="pl-lg-4">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group focused">
								<label class="form-control-label" for="input-address">Address</label>
								<input name="address" class="form-control form-control-alternative" placeholder="Home Address" value=" {{ $profile->address ? : 'N/A' }} " type="text">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group focused">
								<label class="form-control-label" for="input-city">City</label>
								<input type="text" name="city" class="form-control form-control-alternative" placeholder="City" value=" {{ $profile->city ? : 'N/A' }} ">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group focused">
								<label class="form-control-label" for="input-country">Country</label>
								<input type="text" name="country" class="form-control form-control-alternative" placeholder="Country" value=" {{ $profile->country ? : 'N/A' }} ">
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group focused">
								<label class="form-control-label" for="input-city">Who Are You?</label>
								<input type="text" name="title" class="form-control form-control-alternative" placeholder="Title" value=" {{ $profile->title ? : 'N/A' }} ">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group focused">
								<label class="form-control-label" for="input-country">Description</label>
								<input type="text" name="description" class="form-control form-control-alternative" placeholder="descibe yourself" value=" {{ $profile->description ? : 'a few words about you' }} ">
							</div>
						</div>
						
					</div>
				</div>
				<hr class="my-4">
				<!-- Description -->
				<h6 class="heading-small text-muted mb-4">About me</h6>
				<div class="pl-lg-4">
					<div class="form-group focused">
						<label>About Me</label>
						<textarea rows="4" name="info" class="form-control form-control-alternative" placeholder="A few words about you ..."> {{ $profile->info ? : 'N/A' }} </textarea>
					</div>
				</div>


				<div class="pl-lg-4">
					<div class="form-group focused">
						<label>dp</label>
						<input type="file" name="image">
					</div>
				</div>


				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary btn-block ml-3 ">Update</button>
				</div>


			</form>
		</div>
	</div>
</div>
