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
//     return view('welcome');
// });

// Route::get('/', 'HomeController@login');

Auth::routes();
Route::get('/','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/listproduct','ProductController@index')->name('products.index');
Route::get('/products/create', 'ProductController@create');
Route::post('/products/store', 'ProductController@store');
Route::get('/products/{id}/show', 'ProductController@show');
Route::get('/products/{id}/edit', 'ProductController@edit');
Route::post('/products{id}/update', 'ProductController@update')->name('products.update');
Route::get('/products/{id}/delete', 'ProductController@delete')->name('products.delete');
