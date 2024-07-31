<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/welcome', function () {
    return view('welcome');
});
*/
/* Login and Signup */

Route::get('/', ['uses' => 'PagesController@getIndex'])->name('index');

Route::get('/login', ['uses' => 'AccountController@getLogIn']);

// Route::post('/loginpost', ['uses' => 'AccountController@postLogIn'])->name('loginpost');
Route::post('/login', ['uses' => 'AccountController@postLogIn'])->name('login');

Route::get('/signup', ['uses' => 'AccountController@setCountries']);

// Route::post('/signuppost', ['uses' => 'AccountController@postSignUp'])->name('signuppost');
Route::post('/signup', ['uses' => 'AccountController@postSignUp'])->name('signup');

Route::get('/logout', ['uses' => 'UserController@logOut']);

/* Home */

Route::get('/home', [
	'uses' => 'PostController@getHome',
	'middleware' => 'auth'
])->name('home');

/* Profile */

/* Search */
Route::get('/searchresults', [
	'uses' => 'SearchController@getResults'
])->name('searchresults');

Route::get('/profile/{username}', [
	'uses' => 'ProfileController@getProfile',
	'middleware' => 'auth'
])->name('profile');


/*Route::get('/profile/{id?}', [
	'uses' => 'UserController@profile',
	'middleware' => 'auth'
])->name('profile');*/

/* Edit Profile */

Route::get('/basicinfo', [
	'uses' => 'EditProfileController@basicInfo',
	'middleware' => 'auth'
]);

Route::put('/basicinfo', [
	'uses' => 'EditProfileController@updateBasicInfo',
	'middleware' => 'auth'
])->name('basicinfo');

Route::get('/changeprofilepic', [
	'uses' => 'EditProfileController@changeProfilePic',
	'middleware' => 'auth'
]);

Route::post('/changeprofilepic', [
	'uses' => 'EditProfileController@uploadProfilePic',
	'middleware' => 'auth'
])->name('changeprofilepic');

Route::get('/changepassword', [
	'uses' => 'EditProfileController@changePassword',
	'middleware' => 'auth'
]);

Route::put('/changepassword', [
	'uses' => 'EditProfileController@updatePassword', 
	'middleware' => 'auth'
])->name('changepassword');

Route::get('/deleteaccount', [
	'uses' => 'EditProfileController@deleteAccountPage',
	'middleware' => 'auth'
]);

Route::post('/deleteaccount', [
	'uses' => 'EditProfileController@deleteAccount'
])->name('deleteaccount');

/* Post */

Route::get('/post', [
	'uses' => 'PostController@getSubmit',
	'middleware' => 'auth'
]);

Route::post('/post', [
	'uses' => 'PostController@postCreatePost'
])->name('post');

Route::get('/adminpanel', [
	'uses' => 'AdminPanelController@getAdminPanel',
	'middleware' => 'auth'
]);

/*
--------------------------------------------------------------------------
 Route is the same as CRUD
--------------------------------------------------------------------------

- Create an item
Route::post()

- Read an item
Route::get()

- Update an item
Route::put()

- Delete an item
Route::delete()

*/