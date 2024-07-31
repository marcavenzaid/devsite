@extends('layouts.profile')

@section('title', 'Edit Profile')

@section('content')
	<div class="container-fluid default-padding">
		<div class="row">	
			<div class="col-xs-4">
				<div class="edit-menu list-group">
					<a href="basicinfo" class="list-group-item"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;&nbsp;Basic Information</a>
					<a href="changeprofilepic" class="list-group-item"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Change Profile Pic</a>
					<a href="changepassword" class="list-group-item active"><i class="glyphicon glyphicon-lock"></i>&nbsp;&nbsp;Change Password</a>
					<a href="deleteaccount" class="list-group-item"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete Account</a>
				</div>	
			</div>

			<div class="col-xs-8">
				<form action="{{ route('changepassword') }}" method="post" name="form" class="form-horizontal" autocomplete="off">
					<div class="edit-container panel panel-default">
						<div class="_panel-heading text-left">Change Password</div>

						<div class="panel-body">							
							<div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}" style="margin-bottom:40px;">
								<label for="current_password" class="col-xs-4 control-label">Current Password</label>
								<div class="col-xs-8">
									<input type="password" name="current_password" class="form-control" id="current_password">
									@if($errors->has('current_password'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('current_password') }}</span>
							  		@endif
								</div>							
							</div>

							<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
								<label for="password" class="col-xs-4 control-label">New Password</label>
								<div class="col-xs-8">
									<input type="password" name="password" class="form-control" id="password">
									@if($errors->has('password'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('password') }}</span>
							  		@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
								<label for="re_enter_password" class="col-xs-4 control-label">Re-enter new password</label>
								<div class="col-xs-8">
								  	<input type="password" name="password_confirmation" class="form-control" id="re_enter_password">
								  	@if($errors->has('password_confirmation'))
							  			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('password_confirmation') }}</span>
							  		@endif
								</div>
							</div>
						</div>

						<div class="_panel-footer text-right">
							<button type="submit" name="changePassword_btn" id="update_btn" class="btn _btn-default">Update Profile</button>
						</div>	
					</div>
					<input type="hidden" name="_method" value="put">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
			</div>
		</div>
	</div>
@endsection