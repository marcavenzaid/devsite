<?php 

namespace Devsite\Http\Controllers;

use Devsite\User;
use Devsite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

// Controller for searching.

class SearchController extends Controller {

	public function getResults(Request $request) {
		$query = $request->input('searchQuery');

		if(!$query) {
			return redirect()->back();
		}

		// Change to elastic search
		$users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 
			'LIKE', "{$query}")
			->orWhere('username', 'LIKE' ,"{$query}")
			->get();

		return view('pages/searchresults')->with('users', $users);
	}	
}