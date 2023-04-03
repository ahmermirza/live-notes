<?php

use App\Http\Controllers\Auth\RegisterController;
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
Route::get('/', function(){
    return view('home');
})->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@store');
Route::post('/logout', 'Auth\LogoutController@store')->name('logout');

Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@store');

Route::get('/posts', 'PostController@index')->name('posts');
Route::post('/posts', 'PostController@store');
Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy');

Route::post('/posts/{post}/likes', 'PostController@likePost')->name('like.post');
Route::delete('/posts/{post}/likes', 'PostController@unlikePost')->name('like.post');

Route::get('/user/{user:username}/post', 'ProfileController@index')->name('user.posts');


Route::get('/tryingajax', 'AjaxController@index')->name('tryingajax');
Route::get('/getstates/{countryId}', 'AjaxController@getStates')->name('getstates');
