<?php 

namespace Devsite\Http\Controllers;

use Devsite\User;
use Devsite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Redirector;
use Image;
use File;
use Session;

class EditProfileController extends Controller {

	// Pass the data of the current user in the given view.
	public function basicInfo() {
		$countries = DB::table('countries')->get();
		return view('pages/editprofile/basicinfo', array('user' => Auth::user(), 'countries' => $countries));
	}

	// Pass the data of the current user in the given view.
	public function changeProfilePic() {
		return view('pages/editprofile/changeprofilepic', array('user' => Auth::user()));
	}

	// Return the view.
	public function changePassword() {
		return view('pages/editprofile/changepassword');
	}

	// Return the view.
	public function deleteAccountPage() {
		return view('pages/editprofile/deleteaccount');
	}

	public function updateBasicInfo(Request $request) {
		$this->validate($request, [			
			'first_name' => 'required|max:35|regex:/(^[A-Za-z ]+$)/',
			'last_name' => 'required|max:35|regex:/(^[A-Za-z ]+$)/',
			'username' => 'required|max:16|regex:/(^[A-Za-z0-9_ ]+$)/',
			'email' => 'required|email|regex:/([A-Za-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,3}$)/',
			'month' => 'required',
			'day' => 'required',
			'year' => 'required',
			'country_id' => 'required',
			'sex' => 'required',
			'biography' => 'max:500'
		]);

		$first_name = $request['first_name'];
		$last_name = $request['last_name'];
		$username = $request['username'];	
		$email = $request['email'];
		$month = $request['month'];
		$day = $request['day'];	
		$year = $request['year'];
		$country_id = $request['country_id'];
		$sex = $request['sex'];
		if($request['biography'] !== NULL) {
			$biography = $request['biography'];
		} else {
			$biography = '';
		}

		// Get the currently authenticated user.
		$user = Auth::user();

		// Save data to database.
		$user->first_name = ucwords(strtolower($first_name));
		$user->last_name = ucwords(strtolower($last_name));
		$user->username = $username;
		$user->email = $email;
		$user->birthdate = $year. '-' . $month . '-' . $day;
		$user->country_id = $country_id;
		$user->sex = $sex;
		$user->biography = $biography;

		$user->save();

		// Set flash data with success message.
		Session::flash('message', 'Account has been updated successfully!'); // The message.
		Session::flash('alert-class', 'alert-success'); // The class.

		// Redirect user to edit page.
		return redirect()->back();
	}

	// The function to be executed when the user uploads a new profile picture.
	public function uploadProfilePic(Request $request) {		
		// Get the currently authenticated user.
		$user = Auth::user();

		// Handle the user upload of avatar
		if($request->hasFile('image')) {
			$profile_pic = $request->file('image');
			$filename = time() . '.' . $profile_pic->getClientOriginalExtension(); // Get the file type eg. jpg/png

			// Delete current image before uploading new image.
            if ($user->profile_pic !== 'default.jpg') {
                $path = 'uploads/profile_pics/';
                $lastpath = $user->profile_pic;

                File::Delete(public_path($path . $lastpath));
            }

            Image::make($profile_pic)->fit(370,370)->save(public_path('/uploads/profile_pics/' . $filename));
			// Image::make($profile_pic)->save(public_path('/uploads/profile_pics/' . $filename));

			$user->profile_pic = $filename;
			$user->save();
		}

		// Set flash data with success message.
		Session::flash('message', 'Profile picture has been changed successfully!'); // The message.
		Session::flash('alert-class', 'alert-success'); // The class.

		return redirect()->back();
	}

	public function updatePassword(Request $request) {
		// Validate the data.
		$this->validate($request, [	
			'current_password' => 'required',
			'password' => 'required|min:6|max:32|confirmed|alpha_num',
			'password_confirmation' => 'required'
		]);

		// Get the currently authenticated user.
		$user = Auth::user();

		$current_password = $request['current_password'];

		if(Hash::check($current_password, $user->password)) {
			// Put data in variable.
			$password = Hash::make($request['password']);
			$user->password = $password;
			$user->save();

			// Set flash data with success message.
			Session::flash('message', 'Password has been updated successfully!'); // The message.
			Session::flash('alert-class', 'alert-success'); // The class.				
		} else {
			$error_message = "Current password is incorrect!";
			return redirect()->back()->withErrors($error_message);
		}

		return redirect()->route('changepassword');
	}

	public function deleteAccount(Request $request) {
		// Get the currently authenticated user.
		$user = Auth::user();		
		// Delete user posts in posts table.
		DB::table('posts')->where('user_id', $user->id)->delete();
		// Delete user records in users table.
		$user->delete();
		return redirect()->route('index');
	}
}