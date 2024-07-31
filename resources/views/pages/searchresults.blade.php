@extends('layouts.home')

@section('title', 'Search Results')

@section('content')
	<div class="container-fluid default-padding">
		<div class="row">
			<div class="col-xs-12 remove-margin-padding">
				<h3 style="margin-bottom:30px;">Search results for {{ Request::input('searchQuery') }}:</h3>
			</div>

			@if(!$users->count())
				<p>No results found.</p>
			@else
				<div class="col-xs-12">
					@foreach($users as $user)
					<div class="media">
						<div class="media-left">
							<a href="{{ route('profile', ['username' => $user->username]) }}">
								<img class="media-object search-profile-pic" src="/uploads/profile_pics/{{ $user->profile_pic }}" alt="profile pic">
							</a>
						</div>
						<div class="media-body">
							<a href="{{ route('profile', ['username' => $user->username]) }}">
								<h4 class="media-heading">{{ $user->first_name . ' ' . $user->last_name }}</h4>
							</a>
							<span class="post-genre">{{ $user->username }}</span>
						</div>
					</div>
					<hr>
					@endforeach
				</div>
			@endif
		</div>
	</div>
@endsection