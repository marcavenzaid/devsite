@extends('layouts.default')

@section('title', 'Devsite | Sign up')
	
@section('content')
	<div class="container-fluid login-signup-bg">			
		<div class="row">
			<div class="col-xs-12">				
				<!-- Registration Form -->	
				<form action="{{ route('signup') }}" id="registration_form" method="POST" name="form" class="form-horizontal" autocomplete="off">
					<div id="signup-container" class="panel panel-default" style="background-color: rgba(255, 255, 255, 0.9);">
						<div class="_panel-heading text-center">SIGN UP FOR DEVSITE</div>
						
						<div class="panel-body">
							<!-- Name -->
							<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
								<label for="first_name" class="col-xs-3 control-label">First Name</label>
								<div class="col-xs-9">
							  		<input type="text" name="first_name" class="form-control" id="first_name" placeholder="First" value="{{ Request::old('first_name') }}">
							  		@if($errors->has('first_name'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('first_name') }}</span>
							  		@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
								<label for="last_name" class="col-xs-3 control-label">Last Name</label>
								<div class="col-xs-9">
								    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last" value="{{ Request::old('last_name') }}">
								    @if($errors->has('last_name'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('last_name') }}</span>
							  		@endif
								</div>
							</div>

							<!-- Username -->
							<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
								<label for="username" class="col-xs-3 control-label">Username</label>
								<div class="col-xs-9">
							    	<input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ Request::old('username') }}">
							    	@if($errors->has('username'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('username') }}</span>
							  		@endif
							    </div>
							</div>

							<!-- Email Address -->
							<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email_address_form">
								<label for="email_address" class="col-xs-3 control-label">Email Address</label>
								<div class="col-xs-9">
									<input type="email" name="email" class="form-control" id="email_address" placeholder="ex. my_email@yahoo.com" value="{{ Request::old('email') }}">
									@if($errors->has('email'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('email') }}</span>
							  		@endif
								</div>
							</div>

							<!-- Password -->
							<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
								<label for="password" class="col-xs-3 control-label">Password</label>
								<div class="col-xs-9">
									<input type="password" name="password" class="form-control" id="password" placeholder="your password" value="{{ Request::old('password') }}">
									@if($errors->has('password'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('password') }}</span>
							  		@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
								<label for="password_confirmation" class="col-xs-3 control-label">Confirm Password</label>
								<div class="col-xs-9">
							  		<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Re-enter your password" value="{{ Request::old('password_confirmation') }}">
							  		@if($errors->has('password_confirmation'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('password_confirmation') }}</span>
							  		@endif	
							  	</div>
							</div>

							<!-- Birthdate (birthdate have a javascript function used in scripts.js > call())-->
							<div class="form-group {{ $errors->has('month') ? 'has-error' : '' }}"> 
								<label for="month" class="col-xs-3 control-label">Birthdate</label>
								<!-- Month -->
								<!-- call() is on scripts.js -->
								<div class="col-xs-9 form-inline">
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
							<div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
								<label for="country" class="col-xs-3 control-label">Country</label>
								<div class="col-xs-9">
									<select class="form-control" name="country_id" id="country">
										<option value="">Select a Country</option>
										@foreach($countries as $country)
											<option value="{{ $country->id }}" 
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
							<div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
								<label class="col-xs-3 control-label">Sex &nbsp;&nbsp;</label>
								<div class="col-xs-9 radio">
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
						</div>

						<div class="_panel-footer text-right">
							<button type="submit" id="signup_btn" class="btn _btn-default"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Sign up</button>							

							<a type="button" class="btn _btn-default-2" href="login"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Already have an account?</a>
						</div>
					</div>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>
			</div>
		</div>
	</div>
@endsection

@section('additional_scripts')
	<script type="text/javascript" src="js/scripts.js"></script>

	<script type="text/javascript">
		var errors = {!! json_encode($errors->toArray()) !!};
		if(errors.length == 0) {			
		  	$("#signup-container").css({
	  			'height' : '0',
		  		'width' : '0'
		  	}).delay(300).animate({
		  		height: 637
		  	}, 400, "swing");

		  	$("#signup-container").animate({
		  		width: 750
		  	}, 600);

		  	$("#signup-container *").fadeOut(0).delay(1300).fadeIn(400);

			$("body").click(function() {
			  	$("#signup-container").finish();
			  	$("#signup-container *").finish();
			});
		}
	</script>
@endsection