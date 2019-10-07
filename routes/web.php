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
    if(Auth::check())
    return redirect('/home');
    else 
    return view('auth/login');
});

Route::group(['middleware'=>['auth']],function(){

    Route::get('user/profile','UserController@edit')->name('user.profile');
    Route::patch('user','UserController@update');


    Route::resource('post','PostController');
    Route::get('user/posts','PostController@userPosts');
    Route::get('user/{id}/posts','PostController@userFriendPosts');


    Route::resource('like','LikeController');
    Route::resource('comment','CommentController');
    //Route::resource('comment','CommentController');

    Route::get('users','UserController@index')->name('users');
    Route::get('user_info/{id}','UserController@user_info');
    Route::get('search','UserController@autocomplete');

    Route::resource('follow','FollowController');
    Route::get('user/follows','FollowController@index'); 

    Route::get('home','PostController@index')->name('home');

});

Auth::routes();


