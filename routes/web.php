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
    return view('welcome');
})->name('index');
//Helps On Reload Page
Route::get('/{contact?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('post/add','PostController@add')->name('post.add');
Route::get('post/{id}','PostController@getSingle')->name('post.getSingle');
Route::post('post/insert','PostController@insert')->name('post.insert');
Route::post('post/getData','HomeController@postData')->name('posts.getData');

