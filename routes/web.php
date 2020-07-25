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

Route::middleware('auth')->group(function (){
    Route::get('/tweet', 'TweetController@index')->name('home');
    Route::post('/tweet', 'TweetController@store');

    Route::post('/profile/{user:username}/follow', 'FollowController@store');
    Route::get('/profile/{user:username}', 'ProfileController@show')->name('profile');
    Route::get('/profile/{user:username}/edit', 'ProfileController@edit')->middleware('can:edit,user');
    Route::patch('profile/{user:username}', 'ProfileController@update')->middleware('can:edit,user');
    Route::get('/explore','ExploreController@index');


});



Auth::routes();

