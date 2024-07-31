@extends('layouts.default')

@section('title', 'Devsite | Log in')

@section('content')
	<div class="container-fluid login-signup-bg">
		<div class="row">
			<div class="col-xs-12 login-body">				
				<!-- Login Form -->
				<form action="{{ route('login') }}" name="form" method="post" data-toggle="validator">
					<div id="login-container" class="panel panel-default" style="background-color: rgba(255, 255, 255, 0.9);">
						<div class="_panel-heading text-center">LOG IN TO DEVSITE</div>

						<!-- Show errors if there are any. -->
						@if(count($errors) > 0)
							<div class="_errors text-center">
								<ul class="list-unstyled">
									@foreach($errors->all() as $error)
										<li><i class="glyphicon glyphicon-exclamation-sign" style="margin-right:5px;"></i>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<div class="panel-body">
							<!-- Email -->
					  		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						    	<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ Request::old('email') }}">
						 	</div>

						 	<!-- Password -->
						  	<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
						 	</div>

						 	<!-- Remember me and facebook, twitter, google -->
					 		<div class="form-group">
						  		<label id="remember">
						  			<input type="checkbox" name="remember"> Remember me
						  		</label>

						  		<!-- <a href="#"><i class="fa fa-google fa-2x pull-right" style="color: #e0603c;"></i></a>
						  		<a href="#"><i class="fa fa-twitter-square fa-2x pull-right" style="color: #0084b4;"></i></a>
						  		<a href="#"><i class="fa fa-facebook-square fa-2x pull-right" style="color: #3b5998;"></i></a> -->
						  	</div>
					 		
					 		<!-- Buttons -->
					  		<button type="submit" id="login_btn" class="btn _btn-default btn-block"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Log in</button>					  		

					  		<a type="button" class="btn _btn-default-2 btn-block" href="signup"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Sign up</a>
					  	</div>
				  	</div>
				  	<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>	
			</div>						
		</div>
	</div>
@endsection

@section('additional_scripts')
	<script type="text/javascript">
		var errors = {!! json_encode($errors->toArray()) !!};
		if(errors.length == 0) {			
		  	$("#login-container").css({
	  			'height' : '0',
		  		'width' : '0'
		  	}).delay(300).animate({
		  		height: 340
		  	}, 400);

		  	$("#login-container").animate({
		  		width: 500
		  	}, 600);

		  	$("#login-container *").fadeOut(0).delay(1300).fadeIn(400);

		  	$("body").click(function() {
			  	$("#login-container").finish();
			  	$("#login-container *").finish();
			});
		}
	</script>
@endsection