<?php
Route::get('/', function () {
    return view('welcome');
});

// Route for new user
Route::get('/status/{username}', 'Auth\RegisterController@mustVerify');
Route::get('/verify/{token}/{id}', 'Auth\GuestController@showVerify');
Route::post('/verify/{token}/{id}', 'Auth\GuestController@verify');

Auth::routes();




Route::group(['middleware' => ['auth','verify']], function(){
  Route::get('/home', 'HomeController@index')->name('home');
  //user Controller
    Route::get('profile/pass', 'UserController@showPass');
    Route::put('profile/pass/reset', 'UserController@updatePass');
    Route::get('profile/{id?}', 'UserController@profile');
    Route::put('profile/{id?}', 'UserController@update');
    Route::put('profile/pic/{id}', 'UserController@updatePic');

    Route::group(['middleware' => 'role'], function(){
      //kelola User
      Route::get('admin/user', 'UserController@show');
      Route::delete('admin/user/{id}', 'UserController@destroy');
    });
});
