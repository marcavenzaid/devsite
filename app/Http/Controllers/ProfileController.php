<?php 

namespace Devsite\Http\Controllers;

use Devsite\User;
use Devsite\Post;
use Devsite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Image;
use File;

// Controller for searching.

class ProfileController extends Controller {

	public function getProfile($username) {
		$user = User::where('username', $username)->first();
		$posts = DB::table('posts')->where('user_id', $user->id)->latest()->get();

		if(!$user) {
			abort(404);
		}

		return view('pages.profile', ['user' => $user, 'posts' => $posts]);
	}
}