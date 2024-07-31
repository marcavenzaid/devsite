@extends('layouts.home')

@section('title', 'Admin Panel')

@section('content')
	<div class="container-fluid remove-body-offset">
		<div class="row">
			<div class="col-xs-3 remove-margin-padding admin-sidebar">
				<h1 class="title text-center">Admin Panel</h1>

				<div class="list-group text-center">
					<a href="#" class="list-group-item active">Add</a>
					<a href="#" class="list-group-item">Delete</a>
					<a href="#" class="list-group-item">Update</a>
				</div>
			</div>

			<div class="col-xs-9 remove-margin-padding admin-content" style="margin-top: 30px;">
				<form action="" method="POST" name="form" class="form-horizontal" autocomplete="off">
					<!-- Name -->
					<div class="form-group">
						<label for="first_name" class="col-xs-3 control-label">First Name</label>
						<div class="col-xs-8">
					  		<input type="text" name="first_name" class="form-control" id="first_name" placeholder="First">
					  		@if($errors->has('first_name'))
					  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('first_name') }}</span>
					  		@endif
						</div>
					</div>

					<div class="form-group">
						<label for="last_name" class="col-xs-3 control-label">Last Name</label>
						<div class="col-xs-8">
						    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last">
						    @if($errors->has('last_name'))
					  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('last_name') }}</span>
					  		@endif
						</div>
					</div>

					<!-- Username -->
					<div class="form-group">
						<label for="username" class="col-xs-3 control-label">Username</label>
						<div class="col-xs-8">
					    	<input type="text" name="username" class="form-control" id="username" placeholder="Username">
					    	@if($errors->has('username'))
					  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('username') }}</span>
					  		@endif
					    </div>
					</div>

					<!-- Email Address -->
					<div class="form-group" id="email_address_form">
						<label for="email_address" class="col-xs-3 control-label">Email Address</label>
						<div class="col-xs-8">
							<input type="email" name="email" class="form-control" id="email_address" placeholder="ex. my_email@yahoo.com">
							@if($errors->has('email'))
					  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('email') }}</span>
					  		@endif
						</div>
					</div>

					<!-- Password -->
					<div class="form-group">
						<label for="password" class="col-xs-3 control-label">Password</label>
						<div class="col-xs-8">
							<input type="password" name="password" class="form-control" id="password" placeholder="your password">
							@if($errors->has('password'))
					  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('password') }}</span>
					  		@endif
						</div>
					</div>

					<div class="form-group">
						<label for="password_confirmation" class="col-xs-3 control-label">Confirm Password</label>
						<div class="col-xs-8">
					  		<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Re-enter your password">
					  		@if($errors->has('password_confirmation'))
					  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('password_confirmation') }}</span>
					  		@endif	
					  	</div>
					</div>

					<!-- Birthdate (birthdate have a javascript function used in scripts.js > call())-->
					<div class="form-group"> 
						<label for="month" class="col-xs-3 control-label">Birthdate</label>
						<!-- Month -->
						<!-- call() is on scripts.js -->
						<div class="col-xs-8 form-inline">
							<select class="form-control" id="month" name="month" onchange="setDate()">
								<option value="">Month</option>
								<option value="1">Jan</option> 
								<option value="2">Feb</option> 
								<option value="3">Mar</option>
								<option value="4">Apr</option> 
								<option value="5">May</option> 
								<option value="6">Jun</option>
								<option value="7">Jul</option> 
								<option value="8">Aug</option> 
								<option value="9">Sep</option>
								<option value="10">Oct</option> 
								<option value="11">Nov</option> 
								<option value="12">Dec</option>
							</select>
							@if($errors->has('month'))
					  			<span class="help-block" style="display:inline;"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('month') }}</span>
					  			<br>
					  		@endif

							<!-- Day (Calculated in the scripts.js) -->
							<select class="form-control" name="day">
								<option value="">Day</option>								
							</select>
							@if($errors->has('day'))
					  			<span class="help-block" style="display:inline;"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('day') }}</span>
					  			<br>
					  		@endif

							<!-- Year (Calculated in the scripts.js) -->
							<select class="form-control" name="year">
								<option value="">Year</option>
							</select>
							@if($errors->has('year'))
					  			<span class="help-block" style="display:inline;"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('year') }}</span>
					  		@endif
						</div>
					</div>

					<!-- Country -->
					<div class="form-group">
						<label for="country" class="col-xs-3 control-label">Country</label>
						<div class="col-xs-8">
							<select class="form-control" name="country_id" id="country">
								<option value="">Select a Country</option>
								@foreach($countries as $country)
									<option
										@if (old('country_id') == $country->id) 
											selected='selected' 
										@endif> {{ $country->name }}
									</option>
								@endforeach
							</select>
							@if($errors->has('country_id'))
					  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('country_id') }}</span>
					  		@endif
						</div>
					</div>

					<!-- Sex -->
					<div class="form-group">
						<label class="col-xs-3 control-label">Sex &nbsp;&nbsp;</label>
						<div class="col-xs-8 radio">
							<label class="radio-inline control-label">
						  		<input type="radio" name="sex" value="f"
						  			@if (old('sex') == 'f')
						  				checked='checked'
						  			@endif> Female
							</label>									

							<label class="radio-inline control-label">
						  		<input type="radio" name="sex" value="m"
						  			@if (old('sex') == 'm')
						  				checked='checked'
						  			@endif> Male
							</label>
							@if($errors->has('sex'))
					  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('sex') }}</span>
					  		@endif
						</div>
					</div>							

					<div class="text-center">
						<button type="submit" id="signup_btn" class="btn _btn-default"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Add</button>
					</div>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>
			</div>
		</div>
	</div>
@endsection