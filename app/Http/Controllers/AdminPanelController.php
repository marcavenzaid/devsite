<?php 

namespace Devsite\Http\Controllers;

use Devsite\User;
use Devsite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

// Controller for static pages.

class AdminPanelController extends Controller {

	public function getAdminPanel() {
		$user = User::all();
		$countries = DB::table('countries')->get();
		return view('pages/adminpanel', ['user' => $user, 'countries' => $countries]);
	}

	public function add() {
		// Validate the data.
		$this->validate($request, [			
			'first_name' => 'required|max:35|regex:/(^[A-Za-z ]+$)/',
			'last_name' => 'required|max:35|regex:/(^[A-Za-z ]+$)/',
			'username' => 'required|max:16|regex:/(^[A-Za-z0-9_ ]+$)/',
			'email' => 'required|email|unique:users|regex:/([A-Za-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,3}$)/',
			'password' => 'required|min:6|max:32|confirmed|alpha_num',
			'password_confirmation' => 'required',
			'month' => 'required',
			'day' => 'required',
			'year' => 'required',
			'country_id' => 'required',
			'sex' => 'required'
		]);

		// Put data in variable.
		$first_name = $request['first_name'];
		$last_name = $request['last_name'];
		$username = $request['username'];
		$email = $request['email'];
		$password = Hash::make($request['password']);
		$month = $request['month'];
		$day = $request['day'];
		$year = $request['year'];
		$country_id = $request['country_id'];
		$sex = $request['sex'];
		$biography = $request['biography'];

		// Save data to database.
		$user = new User();		
		$user->first_name = ucwords(strtolower($first_name));
		$user->last_name = ucwords(strtolower($last_name));
		$user->username = $username;
		$user->email = $email;
		$user->password = $password;
		$user->birthdate = $year. '-' . $month . '-' . $day;
		$user->country_id = $country_id;
		$user->sex = $sex;
		$user->biography = "";

		$user->save();
	}
}