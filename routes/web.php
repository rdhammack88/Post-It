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

// Route::get('/', function () {
//     return view('layouts.app');
// })->name('home');
// //  ['as' => 'home'],


Route::get('/', 'BlogPostController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/blogs', 'BlogPostController');
Route::resource('/User', 'UserController');

// Route::get('/dashboard', function () {
//     return view('blogs.dashboard');
// })->name('dashboard');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/blogs/user/{id}', 'UserBlogController@index')->name('user_blogs');
