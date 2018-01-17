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

//Print to PDF
Route::get('/user/order/print/topdf/{id}','UserController@getPrintToPdf')->name('user.printtopdf')->middleware('auth');

//Charts
Route::get('charts','chartController@index');

// FrontEnd
Route::get('/', 'FrontEndProductController@index')->name('frontEnd.home');

// Search
Route::post('/search', 'FrontEndProductController@getSearch')->name('product.search');

// Show by Category
Route::get('/category/{kategori}', 'FrontEndProductController@getByCategory')->name('product.getByCategory');

// Product Detail
Route::get('/detail/{id}', 'FrontEndProductController@getProductDetail')->name('product.detail');

// Contacts
Route::get('/contact', 'FrontEndContactController@getMaster')->name('frontEnd.contact')->middleware('guest');

// Products
Route::get('/shop', 'FrontEndProductController@getMaster')->name('frontEnd.product');

// User profile
Route::get('/user/profile', 'UserController@getProfile')->name('user.profile')->middleware('auth');

// Detail Order
Route::get('/user/order/print/{id}', 'UserController@getDetailOrder')->name('user.detailorder')->middleware('auth');

// Shopping Cart
Route::get('/shopping-cart', 'FrontEndProductController@getCart')->name('frontEnd.shoppingCart');

// Shopping Cart - add product by one
Route::get('/shopping-cart/add/{id}', 'FrontEndProductController@getAdd')->name('shoppingCart.product.add');

// Shopping Cart - remove product by one
Route::get('/shopping-cart/remove/{id}', 'FrontEndProductController@getRemove')->name('shoppingCart.product.remove');

// Shopping cart - remove whole items
Route::get('/shopping-cart/remove-all/{id}', 'FrontEndProductController@getRemoveAll')->name('shoppingCart.product.removeAll');

// Checkout
Route::get('/checkout', 'FrontEndProductController@getCheckout')->name('frontEnd.checkout')->middleware('auth');
Route::get('/checkout/provinces', 'FrontEndProductController@getProvinces')->name('frontEnd.checkout.provinces')->middleware('auth');
Route::get('/checkout/city/{id}', 'FrontEndProductController@getCity')->name('frontEnd.checkout.city')->middleware('auth');
Route::get('/checkout/cost/{kota}/{kurir}', 'FrontEndProductController@getCost')->name('frontEnd.checkout.cost')->middleware('auth');

//  <--------------------- ###### ------------------->

// BackEnd
Route::get('/admin', 'AdminHomeController@getMaster')->name('admin.home')->middleware('admin');

// Login - Admin
Route::get('/admin/signin', 'AdminHomeController@getSignIn')->name('admin.getSignIn');

// Login - Admin Post
Route::post('/admin/signin', 'AdminHomeController@postSignIn')->name('admin.postSignIn');

// Logout - Admin
Route::get('/admin/logout', 'AdminHomeController@getLogout')->name('admin.logout');

// Category - Admin
Route::get('/admin/category/create', 'CategoryController@create')->name('category.create')->middleware('admin');
Route::get('/admin/category', 'CategoryController@index')->name('category.index')->middleware('admin');
Route::post('/admin/category/store', 'CategoryController@store')->name('category.store')->middleware('admin');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/admin/category/update/{id}', 'CategoryController@update')->name('category.update')->middleware('admin');
Route::get('/admin/category/delete/{id}', 'CategoryController@destroy')->name('category.delete')->middleware('admin');

// Products - Admin
Route::get('/admin/product', 'ProductController@index')->name('product.index')->middleware('admin');
Route::get('/admin/product/create', 'ProductController@create')->name('product.create')->middleware('admin');
Route::post('/admin/product/store', 'ProductController@store')->name('product.store')->middleware('admin');
Route::get('/admin/product/delete/{id}', 'ProductController@destroy')->name('product.delete')->middleware('admin');
Route::get('/admin/product/edit/{id}', 'ProductController@edit')->name('product.edit')->middleware('admin');
Route::post('/admin/product/update/{id}', 'ProductController@update')->name('product.update')->middleware('admin');

// Admin - Order
Route::get('/admin/orders', 'OrderController@index')->name('order.index')->middleware('admin');

// Admin - Confirm Payment Order
Route::get('admin/orders/confirm/{id}', 'OrderController@confirm')->name('order.confirm')->middleware('admin');

// Admin - Unconfirm Payment Order
Route::get('admin/orders/unconfirm/{id}', 'OrderController@unconfirm')->name('order.unconfirm')->middleware('admin');

// User - Signup
Route::post('/user/signup', 'UserController@postSignup')->name('user.signup')->middleware('guest');

// User - Signin
Route::post('/user/signin', 'UserController@postSignin')->name('user.signin')->middleware('guest');

// User - Logout
Route::get('/user/logout', 'UserController@getLogout')->name('user.logout')->middleware('auth');

// Add to Cart
Route::get('/add-to-cart/{id}', 'FrontEndProductController@getAddtoCart')->name('product.addToCart');

// Checkout
Route::post('/checkout', 'FrontEndProductController@postCheckout')->name('product.checkout')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
