<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');

    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::get(
        '/profiles/{user:username}/edit', 'ProfilesController@edit'
    )->middleware('can:edit,user');	
    Route::post(
        '/profiles/{user:username}/follow',
        'FollowsController@store'
    )->name('follow');
    Route::post('/tweets', 'TweetController@store');

    Route::patch(
        '/profiles/{user:username}',
            'ProfilesController@update'
        )->middleware('can:edit,user');

        Route::get('/explore', 'ExploreController');
});

Route::get('/profiles/{user}','ProfileController@show')->name('profile');



Auth::routes();