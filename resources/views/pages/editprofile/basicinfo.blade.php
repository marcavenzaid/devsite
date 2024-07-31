@extends('layouts.profile')

@section('title', 'Edit Profile')

@section('content')
	<div class="container-fluid default-padding">
		<div class="row">
			<div class="col-xs-4">
				<div class="edit-menu list-group">
					<a href="basicinfo" class="list-group-item active"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;&nbsp;Basic Information</a>
					<a href="changeprofilepic" class="list-group-item"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Change Profile Pic</a>
					<a href="changepassword" class="list-group-item"><i class="glyphicon glyphicon-lock"></i>&nbsp;&nbsp;Change Password</a>
					<a href="deleteaccount" class="list-group-item"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete Account</a>
				</div>	
			</div>			

			<div class="col-xs-8">				
				<form action="{{ route('basicinfo') }}" method="post" name="form" class="form-horizontal" autocomplete="off">
					<div class="edit-container panel panel-default">
						<div class="_panel-heading text-left">Basic Information</div>

						<div class="panel-body">
							<!-- First name -->	
							<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
								<label for="first_name" class="col-xs-2 control-label">First Name</label>
								<div class="col-xs-10">									
							  		<input type="text" name="first_name" class="form-control" id="first_name"
							  		value="{{ $user->first_name }}">
							  		@if($errors->has('first_name'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('first_name') }}</span>
							  		@endif
							  	</div>									  					  	
						  	</div>

					  		<!-- Last name -->
						  	<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
						  		<label for="last_name" class="col-xs-2 control-label">Last Name</label>
						  		<div class="col-xs-10">
							  		<input type="text" name="last_name" class="form-control" id="last_name"
							  		value="{{ $user->last_name }}">
							  		@if($errors->has('last_name'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('last_name') }}</span>
							  		@endif
							  	</div>	
						  	</div>

						  	<!-- Username -->
							<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
								<label for="username" class="col-xs-2 control-label">Username</label>
								<div class="col-xs-10">
								    <input type="text" name="username" class="form-control" id="username"
								    value="{{ $user->username }}">
								    @if($errors->has('user_name'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('user_name') }}</span>
							  		@endif
								</div>
							</div>

						  	<!-- Email Address -->
				  			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email_address_form">
								<label for="email" class="col-xs-2 control-label">Email</label>
								<div class="col-xs-10">
									<input type="email" name="email" class="form-control" id="email_address"
									value="{{ $user->email }}">
									@if($errors->has('email'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('email') }}</span>
							  		@endif
								</div>
							</div>

							<!-- Birthdate (birthdate have a javascript function used in scripts.js > call())-->
							<div class="form-group {{ $errors->has('month') ? 'has-error' : '' }}">
								<label for="month" class="col-xs-2 control-label">Birthdate</label>
								<!-- Month -->
								<div class="col-xs-10 form-inline">
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
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('month') }}</span>
							  			<br>
							  		@endif

									<!-- Day (Calculated in the scripts.js) -->
									<select class="form-control" id="day" name="day">
										<option value="">Day</option>								
									</select>
									@if($errors->has('day'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('day') }}</span>
							  			<br>
							  		@endif

									<!-- Year (Calculated in the scripts.js) -->
									<select class="form-control" id="year" name="year">
										<option value="">Year</option>
									</select>
									@if($errors->has('year'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('year') }}</span>
							  			<br>
							  		@endif
								</div>
							</div>

							<!-- Country -->
							<div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
								<label for="country_id" class="col-xs-2 control-label">Country</label>
								<div class="col-xs-10">					
									<select class="form-control" name="country_id" id="country_id">
										<option value="">Select a Country</option>
										@foreach($countries as $country)
											<option value="{{ $country->id }}"> 
												{{ $country->name }}
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
								<label class="col-xs-2 control-label">Sex</label>
								<div class="col-xs-10 radio">
									<label class="radio-inline control-label">
								  		<input type="radio" id="female" name="sex" value="f"> Female
									</label>

									<label class="radio-inline control-label">
								  		<input type="radio" id="male" name="sex" value="m"> Male
									</label>
									@if($errors->has('sex'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('sex') }}</span>
							  		@endif
								</div>
							</div>

							<!-- Biography -->
							<div class="form-group {{ $errors->has('biography') ? 'has-error' : '' }}">
								<label for="biography" class="col-xs-2 control-label">Biography</label>
								<div class="col-xs-10">
									<textarea rows="5" class="form-control" name="biography" id="biography" placeholder="Biography">{{ $user->biography }}</textarea>
								</div>
							</div>							
						</div>

						<div class="_panel-footer text-right">
							<button type="submit" id="update_btn" name="update_basicInfo_btn" class="btn _btn-default"><i class="glyphicon glyphicon-open"></i>&nbsp;&nbsp;Update Profile</button>
						</div>
					</div>
					<input type="hidden" name="_method" value="put">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				</form>
			</div>
		</div>
	</div>
@endsection

@section('additional_scripts')
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<?php
		$birthdate = $user->birthdate;
		$segments = explode('-', $birthdate);
		$year = $segments[0];
		$month = $segments[1];
		$day = $segments[2];

		$country_id = $user->country_id;
	?>

	<script type="text/javascript">
		// Set the birthdate based on the database.
		selectElement("month", <?php echo $month ?>);
		setDate(); // Call the call() function in the scripts.js to set the date.
		selectElement("day", <?php echo $day ?>);
		selectElement("year", <?php echo $year ?>);

		// Set the Country based on the database.
		selectElement("country_id", <?php echo $country_id ?>);

		// Set the sex based on the database.
		var sex = <?php echo json_encode($user->sex) ?>;

		if(sex == 'f') {
			document.getElementById("female").checked = true;
		} else {
	    	document.getElementById("male").checked = true;
	  	}
	</script>
@endsection