<?php 

namespace Devsite\Http\Controllers;

use Devsite\Post;
use Devsite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Image;
use File;

class UserController extends Controller {	

	// Pass the data of the current user in the given view.
	public function profile() {
		$user = Auth::user();
		// All post with used id equal to current user id, sorted from latest.
		$posts = DB::table('posts')->where('user_id', $user->id)->latest()->get();
		return view('pages.profile', ['user' => $user, 'posts' => $posts]);
	}

	public function setCountries() {
		$countries = DB::table('countries')->get();
		return view('pages.register', ['countries' => $countries]);
	}

	// The function to be executed when the user logs out.
	public function logOut() {
		Auth::logout();
		return redirect()->route('index');
	}
}