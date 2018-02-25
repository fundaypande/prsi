<?php
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;
Route::get('/', function () {
    return view('welcome');
});

// Route for new user
Route::get('/status/{username}', 'Auth\RegisterController@mustVerify');
Route::get('/verify/{token}/{id}', 'Auth\GuestController@showVerify');
Route::post('/verify/{token}/{id}', 'Auth\GuestController@verify');

Auth::routes();

Route::group(['middleware' => ['auth','verify']], function(){

  //atlit ajax
  Route::post('atlits/s', 'AtlitController@search');
  Route::get('atlit/{sub?}', 'AtlitController@myPosts');
  Route::resource('atlits','AtlitController');

  //sekolah ajax
  Route::post('sekolahs/s', 'SekolahController@search');
  Route::get('sekolah/{sub?}', 'SekolahController@myPosts');
  Route::resource('sekolahs','SekolahController');

  //lomba ajax
  Route::post('lombas/s', 'LombaController@search');
  Route::get('lomba/{sub?}', 'LombaController@myPosts');
  Route::resource('lombas','LombaController');

  //umur ajax
  Route::post('kus/s', 'UmurController@search');
  Route::get('ku/{sub?}', 'UmurController@myPosts');
  Route::resource('kus','UmurController');

  //register Ajax
  Route::get('register/school', 'SekolahController@data');

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
      Route::put('admin/user/role/{id}/{stat}', 'UserController@role');
    });
});
