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
Route::get('/contact', 'FrontEndContactController@getMaster')->name('frontEnd.contact');

// Products
Route::get('/shop', 'FrontEndProductController@getMaster')->name('frontEnd.product');

// BackEnd
Route::get('/admin', 'AdminHomeController@getMaster')->name('admin.home');

// Category - Admin
Route::get('/admin/category/create', 'CategoryController@create')->name('category.create');
Route::get('/admin/category', 'CategoryController@index')->name('category.index');
Route::post('/admin/category/store', 'CategoryController@store')->name('category.store');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/admin/category/update/{id}', 'CategoryController@update')->name('category.update');
Route::get('/admin/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

// Products - Admin
Route::get('/admin/product', 'ProductController@index')->name('product.index');
Route::get('/admin/product/create', 'ProductController@create')->name('product.create');
Route::post('/admin/product/store', 'ProductController@store')->name('product.store');
Route::get('/admin/product/delete/{id}', 'ProductController@destroy')->name('product.delete');
Route::get('/admin/product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::post('/admin/product/update/{id}', 'ProductController@update')->name('product.update');