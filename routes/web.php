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

// FrontEnd
Route::get('/', 'FrontEndHomeController@getMaster')->name('frontEnd.home');

// Contacts
Route::get('/contact', 'FrontEndContactController@getMaster')->name('frontEnd.contact')->middleware('guest');

// Products
Route::get('/shop', 'FrontEndProductController@getMaster')->name('frontEnd.product')->middleware('guest');

// User profile
Route::get('/user/profile', 'UserController@getProfile')->name('user.profile')->middleware('auth');

//  <--------------------- ###### ------------------->

// BackEnd
Route::get('/admin', 'AdminHomeController@getMaster')->name('admin.home')->middleware('guest');

// Category - Admin
Route::get('/admin/category/create', 'CategoryController@create')->name('category.create')->middleware('guest');
Route::get('/admin/category', 'CategoryController@index')->name('category.index')->middleware('guest');
Route::post('/admin/category/store', 'CategoryController@store')->name('category.store')->middleware('guest');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/admin/category/update/{id}', 'CategoryController@update')->name('category.update')->middleware('guest');
Route::get('/admin/category/delete/{id}', 'CategoryController@destroy')->name('category.delete')->middleware('guest');

// Products - Admin
Route::get('/admin/product', 'ProductController@index')->name('product.index')->middleware('guest');
Route::get('/admin/product/create', 'ProductController@create')->name('product.create')->middleware('guest');
Route::post('/admin/product/store', 'ProductController@store')->name('product.store')->middleware('guest');
Route::get('/admin/product/delete/{id}', 'ProductController@destroy')->name('product.delete')->middleware('guest');
Route::get('/admin/product/edit/{id}', 'ProductController@edit')->name('product.edit')->middleware('guest');
Route::post('/admin/product/update/{id}', 'ProductController@update')->name('product.update')->middleware('guest');

// User - Signup
Route::post('/user/signup', 'UserController@postSignup')->name('user.signup')->middleware('guest');

// User - Signin
Route::post('/user/signin', 'UserController@postSignin')->name('user.signin')->middleware('guest');

// User - Logout
Route::get('/user/logout', 'UserController@getLogout')->name('user.logout')->middleware('auth');

// Add to Cart
Route::get('/add-to-cart/{id}', 'FrontEndProductController@getAddtoCart')->name('product.addToCart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
