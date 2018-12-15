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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/profile','HomeController@profile')->name('profile');

//SHopping Cart
Route::get('/cart','ProductController@temporarycart')->name('order.temporay');
Route::get('/cart-value','ProductController@tmpQty')->name('order.tmpqty');
Route::get('/add-to-cart/{id}', 'ProductController@getcart')->name('product.cart');
Route::get('/shop-to-cart', 'ProductController@shopcart')->name('product.ShoppingCart');
Route::get('/reduce-all/{id}','ProductController@reduceAll')->name('order.reduce-all');
Route::get('/reduce-one/{id}','ProductController@reduceOne')->name('order.reduce-one');
Route::get('/checkout','ProductController@checkout')->name('checkout');
Route::post('/buy','ProductController@buy')->name('order.buy');
Route::get('/laptop','HomeController@laptop')->name('product.laptop');
Route::get('/mobile','HomeController@mobile')->name('product.mobile');
Route::get('/camera','HomeController@camera')->name('product.camera');
Route::get('/headphone','HomeController@headphone')->name('product.headphone');

Route::post('/user-create', 'HomeController@userCreate')->name('usercreate');
Route::post('/user-login', 'HomeController@customlogin')->name('custom.login');
Route::get('/hot-deal','HomeController@hotDeal')->name('hot-deal');

//Admin Site routes
Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


//Category Routes
Route::post('save-category', 'ProductCategory@store')->name('save.category');
Route::get('category', 'ProductCategory@category_details')->name('category');
Route::get('category-fetchdata', 'ProductCategory@fetchdata')->name('category.fetchdata');
Route::post('category-edit', 'ProductCategory@edit')->name('category.edit');
Route::get('category-delete/{category_id}', 'ProductCategory@categorydelete');

//Product Routes
Route::post('/adding-products','ProductController@addProducts')->name('save.products');
Route::get('/products','ProductController@product_details')->name('products');
Route::get('product/fetchdata','ProductController@fetchdata')->name('product.fetchdata');
Route::post('product/update', 'ProductController@updatedata')->name('product.updatedata');
Route::post('product/delete', 'ProductController@detetedata')->name('product.detetedata');

//Orders
Route::get('/current-order','AdminController@currentOrder')->name('current-order');
Route::get('/order-delever','AdminController@orderDeliver')->name('order-delever');
Route::get('/delivered-order','AdminController@deliveredOrder')->name('delivered-order');

//Timers
Route::get('/timer-form','AdminController@timer')->name('timer');
Route::post('/save-timer','AdminController@saveTimer')->name('save.timer');
Route::get('/start-timer/{id}','AdminController@startTimer');
Route::get('/close-timer/{id}','AdminController@closeTimer');