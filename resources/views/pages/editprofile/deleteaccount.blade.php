@extends('layouts.profile')

@section('title', 'Edit Profile')

@section('content')
	<div class="container-fluid default-padding">
		<div class="row">	
			<div class="col-xs-4">
				<div class="edit-menu list-group">
					<a href="basicinfo" class="list-group-item"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;&nbsp;Basic Information</a>
					<a href="changeprofilepic" class="list-group-item"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Change Profile Pic</a>
					<a href="changepassword" class="list-group-item"><i class="glyphicon glyphicon-lock"></i>&nbsp;&nbsp;Change Password</a>
					<a href="deleteaccount" class="list-group-item active"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete Account</a>
				</div>	
			</div>

			<div class="col-xs-8">
				<form action="{{ route('deleteaccount') }}" method="post" name="form" class="horizontal">
					<div class="edit-container panel panel-default">
						<div class="_panel-heading label-danger">Delete Account</div>
						<div class="panel-body">
							<p>Deleting your account means deleting all of your data including your published applications.</p>
							<button type="submit" name="delete_account" class="btn btn-danger btn-margin-v">I UNDERSTAND, DELETE MY ACCOUNT</button>											
						</div>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				</form>
			</div>
		</div>
	</div>
@endsection