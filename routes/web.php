<?php


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


//Profile
Route::resource('user', 'ProfileController');

//Post Routes

Route::get('posts','PostController@index');
Route::post('post/store','PostController@store');
Route::get('posts/edit/{id}','PostController@edit');
Route::patch('post/update/{id}','PostController@update');
Route::get('post/delete/{id}','PostController@destroy');
Route::get('user/{id}/timeline','UserController@timeline')->name('timeline');
Route::patch('user/{id}/update', 'ProfileController@update');
Route::get('post/{id}/detail', 'PostController@detail');

//Comments Route

Route::post('post/{id}/comment', 'PostController@storeComment');




//Following

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('logout','FollowsController@logout');


//User Profile Images

// Route::get('/user/{id}/image', 'ImageController@create');
// Route::post('/store', 'ImageController@store');

