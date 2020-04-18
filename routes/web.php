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


Auth::routes();

Route::get('/email', function () {
    return new \App\Mail\NewUserWelcomeMail();
});

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');

Route::get('/profile', 'ProfilesController@index')->name('profile.index');
Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::post('/comment/{post}', 'CommentsController@store')->name('comment.store');

Route::get('/login/github', 'Auth\LoginController@github');
Route::get('/login/github/redirect', 'Auth\LoginController@githubRedirect');
