@extends('layouts.home')

@section('title', 'Devsite')

@section('content')
	<div class="container-fluid default-padding">
		<div class="row">
			<div class="col-xs-9 remove-margin-padding">
				<!-- <div class="panel panel-default home-menu">
					<div class="panel-body">
						<a href="#"><i class="fa fa-th-list fa-3x" style="margin-right: 10px;"></i></a>
						<a href="#"><i class="fa fa-th-large fa-3x"></i></a>
						<div class="dropdown pull-right">
						  	<button class="btn _btn-default dropdown-toggle" type="button" data-toggle="dropdown">
						    	Sort by
					    		<span class="caret"></span>
						  	</button>
						  	<ul class="dropdown-menu">
							    <li><a href="#">Highest Rating</a></li>
							    <li><a href="#">Most Downloaded</a></li>
						  	</ul>
						</div>
					</div>
				</div> -->
				@foreach($posts->reverse() as $post)
					<?php 
						$user_id = $post->user_id;
						$users = DB::table('users')->where('id', $user_id)->first();
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

							<a href="{{ asset('uploads/posts/files/' . $post->folder_name . '/' . $post->file) }}" download="{{ $post->file }}" type="button" class="btn _btn-default post-download-btn"><i class="fa fa-download fa-lg"></i>&nbsp;&nbsp;Download</a>

							<div class="post-tags">
								<?php foreach ($tags as $tag) { ?>
									<span class="label label-default"><?php echo ltrim(strtoupper($tag)); ?></span>
								<?php } ?>
							</div>


							<div class="post-img">
								<a href="#" id="pop{{ $post->id }}" type="button" data-toggle="modal" data-target="modal{{ $post->images }}">
									<img src="{{ asset('uploads/posts/images/' . $post->images) }}" class="img-responsive">
								</a>
							</div>

							<!-- Modal -->
							<div class="modal fade" id="modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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

													<div class="post-tags pull-right">
														<?php foreach ($tags as $tag) { ?>
															<span class="label label-default"><?php echo ltrim(strtoupper($tag)); ?></span>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>

										<div class="modal-body">
											<img src="{{ asset('uploads/posts/images/' . $post->images) }}" class="img-responsive">
											<hr>
											<p>{{ $post->description }}</p>
										</div>
										<!-- <div class="modal-footer">
										</div> -->
								    </div>
								</div>
							</div>				
							
							<div class="post-description">							
								<p>{{ $post->description }}</p>
							</div>	

							<hr>
								<div class="media">
									<div class="media-left">
										<a href="">
											<img src="/uploads/profile_pics/{{ $users->profile_pic }}" class="media-object post-profile-pic">
										</a>	
									</div>
									<div class="media-body">
										<h4 class="media-heading"><a href="">{{ $post->user->first_name . ' ' . $post->user->last_name }}</a></h4>
										<span class="post-genre">{{ $post->user->username }}</span>
									</div>
								</div>
							<hr>											
						</div>
					</div>

					<!-- Modal Script -->
					<script type="text/javascript">
						$('#pop{{ $post->id }}').on('click', function() {
							$('#modal{{ $post->id }}').modal('show');
						});
					</script>
				@endforeach
			</div>

			<div class="col-xs-3 remove-margin-padding">

				<div class="home-sidebar panel panel-default">
					<div class="_panel-heading-2">
						<h4><i class="fa fa-random fa-lg">&nbsp;</i>Random Applications</h4>
					</div>
					@foreach($randomPosts->slice(0, 3) as $randPost)
						<div class="panel-body">
							<h4>{{ $randPost->title }}</h4>
							<img src="{{ asset('uploads/posts/images/' . $randPost->images) }}" class="img-responsive">
						</div>

						<!-- to limit the border at the bottom or hr -->
						@if($loop->index < count($randomPosts->slice(0, 3)))
							<hr>
						@endif
					@endforeach
				</div>			
			</div>
		</div>
	</div>
@endsection