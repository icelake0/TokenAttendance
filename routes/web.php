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

Route::get('/', function () {
    //return view('welcome');
    return redirect('/login');
});
Auth::routes();
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::group(['middleware'=>['auth']], function(){
	Route::match(['get', 'post'],'/webauth/choserole', 'EntrustController@choseRole')->name('webauth.choserole');
	Route::get('/getTeachers', 'EntrustController@getTeachers')->name('webauth.getTeachers');
	Route::post('/webauth/updateavatar',[
		'uses'=>'EntrustController@updateAvatar',
		'as'=>'webauth.updateavatar',
		]);
	Route::post('/webauth/updateprofile',[
		'uses'=>'EntrustController@updateProfile',
		'as'=>'webauth.updateprofile',
		]);
	Route::group(['middleware'=>['role:superadmin']], function(){
		Route::get('/webauth/manageusers',[
		'uses'=>'EntrustController@manageUsers',
		'as'=>'webauth.manageusers',
		]);
		Route::match(['get', 'post'],'/webauth/changeuserrole',[
		'uses'=>'EntrustController@changeUserRole',
		'as'=>'webauth.changeuserrole',
		]);
		Route::get('/webauth/suspenduser/{userid}',[
		'uses'=>'EntrustController@suspendUser',
		'as'=>'webauth.suspenduser',
		]);
	});

	Route::group(['middleware'=>['role:superadmin|admin']], function(){
		Route::match(['get', 'post'],'/teacherrequest/{teacherRequest}/assignteacher', 'TeacherRequestsController@assignTeacher')->name('teacherrequest.assignteacher');
	});

	Route::group(['middleware'=>['role:teacher']], function(){
		Route::match(['get', 'post'],'webauth/addsubjects','EntrustController@addSubjects')->name('webauth.addsubjects');
	});

	Route::group(['middleware'=>['role:student|parent']], function(){
		Route::match(['get', 'post'],'/teacherrequest/{teacherRequest}/rateteacher', 'TeacherRequestsController@rateTeacher')->name('teacherrequest.rateteacher');
	});

	Route::group(['middleware'=>['role:parent']], function(){
		Route::match(['get', 'post'],'webauth/addchildren', 'EntrustController@addChildren')->name('webauth.addchildren');
	});
	
	Route::match(['get', 'post'],'uploadDocument', 'EntrustController@uploadDocument')->name('uploadDocument');
	Route::delete('uploadDocument/{document}', 'EntrustController@deleteDocument')->name('deleteDocument');

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/profile/{user}/{partial?}', 'EntrustController@profile')->name('profile');//change to webauth and above to resource
	Route::resource('teacherrequest', 'TeacherRequestsController');
});

//Route::get('login/github', 'Auth\LoginController@redirectToProvider');
//Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');']
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');entrust/uploadDocument
