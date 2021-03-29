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

Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/posts','PostController@index')->name('guest.post.index');
Route::get('/posts/{nameplate}','PostController@show')->name('guest.post.show');
Route::get('/contact', 'HomeController@contact')->name('guest.contact');
Route::post('/contact','HomeController@contactSent')->name('guest.contact.sent');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//meglio usare i prefix su questa rotta 


Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function (){
    Route::get('/','HomeController@index')->name('home');
    Route::resource('/post','PostController');
});