@if(Session::has('message'))
	<div class="container">
		<div class="row">
			<div class="col-xs-12 alert {{ Session::get('alert-class') }} flash-message" role="alert">
				<p>{{ Session::get('message') }}</p>
			</div>
		</div>
	</div>
@endif