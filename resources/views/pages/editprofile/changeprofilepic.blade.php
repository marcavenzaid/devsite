@extends('layouts.profile')

@section('title', 'Edit Profile')
@section('additional_links')
	<link rel="stylesheet" type="text/css" href="css/cropper.css">
	<script type="text/javascript" src="js/scripts.js"></script>
@endsection

@section('content')
	<div class="container-fluid default-padding">
		<div class="row">	
			<div class="col-xs-4">
				<div class="edit-menu list-group">
					<a href="basicinfo" class="list-group-item"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;&nbsp;Basic Information</a>
					<a href="changeprofilepic" class="list-group-item active"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Change Profile Pic</a>
					<a href="changepassword" class="list-group-item"><i class="glyphicon glyphicon-lock"></i>&nbsp;&nbsp;Change Password</a>
					<a href="deleteaccount" class="list-group-item"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete Account</a>
				</div>	
			</div>

			<div class="col-xs-8">
				<form action="{{ route('changeprofilepic') }}" method="post" name="form" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
					<div class="edit-container panel panel-default">
						<div class="_panel-heading text-left">Change Profile Pic</div>
						<div class="panel-body text-center">
							<div class="form-group">
								<img src="/uploads/profile_pics/{{ $user->profile_pic }}" class="thumbnail change-profile-pic img-responsive" id="imagePreview">

								<label class="btn _btn-default btn-file" style="width: 380px;"> Upload New Photo
									<input type="file" name="image" onchange="readURL(this);">									
								</label>
							</div>							
						</div>

						<div class="_panel-footer text-right">
							<button type="submit" name="update_profile_pic_btn" id="update_btn" class="btn _btn-default"><i class="glyphicon glyphicon-open"></i>&nbsp;&nbsp;Update Profile</button>
						</div>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
			</div>
		</div>
	</div>
@endsection