@extends('layouts.default')

@section('title', 'Devsite')

@section('content')
	<div class="container-fluid default-padding-box dbbg">
		<div class="row">
			<div class="col-xs-12 typing-animation">
				<p>Hi, Welcome to Devsite, an online community of developers.<span>│ </span></p>
			</div>

			<div class="col-xs-12 slogan text-center">
				<p>We Share, We Learn</p>
			</div>
		</div>
	</div>

	<div class="container-fluid default-padding-box prism-bg">
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<article style="margin-top: 50px; margin-bottom: 50px;">
				    <div class="front" id="article1">
			      		<div class="text">
			        		<h1>Publish</h1>
			      		</div>
				    </div>

				    <div class="back" id="article1b">
			      		<div class="text">
			       			<p>Share your wonderful application to other people.</p>
			      		</div>
			   	 	</div>
			  	</article>
	  		</div>

			<div class="col-xs-12 col-md-4">
				<article style="margin-top: 50px; margin-bottom: 50px;">
				    <div class="front" id="article2">
			      		<div class="text">
			        		<h1>Download</h1>
			      		</div>
				    </div>

				    <div class="back" id="article1b">
			      		<div class="text">
			       			<p>Use and learn from the works of other developer.</p>
			      		</div>
			   	 	</div>
			  	</article>					
			</div>

			<div class="col-xs-12 col-md-4">
				<article style="margin-top: 50px; margin-bottom: 50px;">
				    <div class="front" id="article3">
			      		<div class="text">
			        		<h1>Browse</h1>
			      		</div>
				    </div>

				    <div class="back" id="article1b">
			      		<div class="text">
			       			<p>Find and discover other developers and their creativity.</p>
			      		</div>
			   	 	</div>
			  	</article>				
			</div>
		</div>
	</div>

	<!-- Paragraphs -->
	<div class="container-fluid default-padding-box" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="row">
			<div class="col-xs-12 text-center shit" style="margin-bottom: 30px;">
				<h2>An online community</h2>
			</div>
			<div class="col-xs-6 text-center" style="padding: 0 30px">
				<p>Devsite is an online community where you can share, view, and download various application.
				Devsite can help thousands of people nationwide.</p>
			</div>

			<div class="col-xs-6 text-center" style="padding: 0 30px">
				<p>A place to promote their projects. It helps the developers to showcase their projects to the variety of audience who are interested and connects the developers with other developers, companies, and enthusiast.</p>
			</div>

			<div class="col-xs-12 text-center" style="margin-top: 50px;">
				<a href="/signup" type="button" class="btn _btn-default btn-lg">Join Devsite</a>
			</div>
		</div>
	</div><!-- /Paragraphs -->	
@endsection