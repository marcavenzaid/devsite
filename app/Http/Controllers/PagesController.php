<?php 

namespace Devsite\Http\Controllers;

use Devsite\User;
use Devsite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

// Controller for static pages.

class PagesController extends Controller {

	public function getIndex() {
		return view('pages/index');
	}
}