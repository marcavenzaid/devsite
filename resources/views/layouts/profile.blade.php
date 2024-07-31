<!DOCTYPE html>

<html lang="en">
	<head>
		@include('includes.head')
		@yield('additional_links')
	</head>

	<body class="background-default">	
		<header>
			@include('includes.header')
		</header>

		@include('includes.messages')

		@yield('content')

		<!-- Return to Top -->
		<a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

		<!-- Scripts -->
		<script type="text/javascript" src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
  		<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
  		<script type="text/javascript" src="{{ URL::asset('js/navbar-animations.js') }}"></script>
  		<script type="text/javascript" src="{{ URL::asset('js/returnToTop.js') }}"></script>
  		@yield('additional_scripts')
	</body>
</html>