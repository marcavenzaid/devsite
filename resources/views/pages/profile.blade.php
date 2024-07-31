@extends('layouts.profile')

@section('title', 'Profile')

@section('content')
	<div class="container-fluid default-padding">
		<div class="row">
			<!-- Profile info -->
			<div class="col-xs-4 remove-margin-padding">
				<div class="profile-info-container">
					<a href="/changeprofilepic">
						<img src="/uploads/profile_pics/{{ $user->profile_pic }}" class="thumbnail profile-pic img-responsive" alt="Profile Pic">
					</a>
					
					<h3 class="profile-info profile-name">
						<b>
							{{ $user->first_name . ' ' . $user->last_name }}
						</b>
					</h3>

					<h4 class="profile-info profile-username">
						{{ '(' . $user->username . ')' }}
					</h4>

					<p class="profile-info profile-bio">
						{{ $user->biography }}
					</p>

					<hr class="profile-info"/>
					<p>
						<a href="#" class="profile-info profile-email"><span class="fa fa-envelope"></span>
							{{ $user->email }}
						</a>
					</p>

					<p profile-info><span class="fa fa-birthday-cake"></span>
						 {{ $user->birthdate }}
					</p>

					<p profile-info><span class="fa fa-globe"></span>
						<?php 					
							$country_id = $user->country_id;
							$country = DB::table('countries')->where('id', $country_id)->first();
						?>
						{{ $country->name }}
					</p>

					<p profile-info><span class="fa fa-transgender"></span>							
						<?php
							$sex = $user->sex;
						?>
						@if($sex == 'm')
							{{ 'Male' }}
						@else
							{{ 'Female' }}
						@endif							
					</p>
				</div>
			</div><!-- /Profile info -->

			<!-- Posts -->
			<div class="col-xs-8 remove-margin-padding">
				@if(count($posts) == 0)
					<div class="panel panel-default">
						<div class="panel-body">
							@if($user == Auth::user())
								<p>You haven't posted anything yet. Why not post and show the world your applications?</p>
							@else
								<p>This user haven't posted anything yet.</p>
							@endif
						</div>
					</div>
				@else
					@foreach($posts as $post)
						<?php 
							$tags = explode(',', $post->tags);
						?>
						<div class="panel panel-default">
							<div class="panel-body">								
								<div class="media">
									<div class="media-left">
										<!-- Post icon -->
										<a href="">
											<img src="{{ asset('uploads/posts/icons/' . $post->icon) }}" class="media-object post-home-icon">
										</a>
									</div>
									<div class="media-body">												
										<!-- Post title  -->
										<h3 class="post-title media-heading">{{ $post->title }}</h3>
										<!-- Post genre -->
										<span class="post-genre">{{ $post->genre }}</span>			
									</div>
								</div>

								<button type="button" class="btn _btn-default post-download-btn"><i class="glyphicon glyphicon-download-alt"></i>&nbsp;&nbsp;Download</button>

								<div class="post-tags">
									<?php foreach ($tags as $tag) { ?>
										<span class="label label-default"><?php echo ltrim(strtoupper($tag)); ?></span>
									<?php } ?>
								</div>

								<div class="post-img">
									<img src="{{ asset('uploads/posts/images/' . $post->images) }}" class="img-responsive">
								</div>

								<div class="post-description">							
									<p>{{ $post->description }}</p>
								</div>											
							</div>
						</div>
					@endforeach
				@endif				
			</div>
		</div>
	</div>
@endsection