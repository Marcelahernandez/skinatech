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
Route::get('/', function(){
    return view('auth.login');
});
Route::get('/home', 'AdminController@index')->name('home');
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users/store', 'UserController@store');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::post('/users/update/{id}', 'UserController@update');
Route::get('/users/delete/{id}', 'UserController@delete');


Route::get('/category/create/{id?}', 'CategoryController@create');
Route::get('/category/{id?}', 'CategoryController@index');
Route::post('/category/store', 'CategoryController@store');
Route::get('/category/edit/{id}', 'CategoryController@edit');
Route::post('/category/update/{id}', 'CategoryController@update');
Route::get('/category/delete/{id}', 'CategoryController@delete');
Route::get('/category/show/{id}', 'CategoryController@show');

Route::get('/products', 'ProductController@index');
Route::get('/products/create', 'ProductController@create');
Route::post('/products/store', 'ProductController@store');
Route::get('/products/edit/{id}', 'ProductController@edit');
Route::post('/products/update/{id}', 'ProductController@update');
Route::get('/products/delete/{id}', 'ProductController@delete');
Route::get('/products/show/{id}', 'ProductController@show');
Route::get('/products/subcategories/{id}','ProductController@getSubcategories');
Route::get('/products/edit/subcategories/{id}','ProductController@getSubcategories');



Route::get('/home', 'HomeController@index')->name('home');
