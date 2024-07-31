<!DOCTYPE html>

<html lang="en">
	<head>
		@include('includes.head')
	</head>

	<body>	
		<header>
			@include('includes.header')
		</header>

		@include('includes.messages')

		@yield('content')

		<div class="container-fluid footer">			
			@include('includes.footer')
		</div>

		<!-- Return to Top -->
		<a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

		<!-- Scripts -->
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  		<script type="text/javascript" src="js/bootstrap.min.js"></script>
  		<script type="text/javascript" src="js/navbar-animations.js"></script>
  		<script type="text/javascript" src="js/returnToTop.js"></script>
  		@yield('additional_scripts')
	</body>
</html>