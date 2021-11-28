<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use GuzzleHttp\Middleware;
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

/**
 *  GET => account.index => danh sách
 *  GET => account.create => form thêm mới
 *  POST => account.store => khi submit form thêm mới
 *  GET => account.show => xem chi tiết
 *  GET => account. edit => hiển thị form edit
 *  PUT => account.update => khi submit form edit
 *  DELETE => accont.destroy => khi xóa
 */

Route::get('/','HomeController@index')->name('home.index');
Route::get('/blog','HomeController@blog')->name('home.blog');
Route::get('/contact','HomeController@contact')->name('home.contact');
Route::get('/shop','HomeController@shop')->name('home.shop');
Route::get('/shop/{id}-{slug}','HomeController@category')->name('category');
Route::get('/product-detail/{id}-{slug}','HomeController@product')->name('product');
Route::get('/search','HomeController@search')->name('search');


// route admin

Route::get('admin/login','AdminController@login')->name('admin.login');
Route::get('admin/logout','AdminController@logout')->name('admin.logout');
Route::post('admin/login','AdminController@post_login')->name('admin.login');


Route::group(['prefix' => 'admin','middleware'=>'auth'],function(){
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');

    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'banner' => 'BannerController',
        'blog' => 'BlogController',
        'order' => 'OrderController',
        'user' =>'UserController',
        'account' => 'AccountController'
    ]);
});


Route::group(['prefix' => 'cart'],function(){
    Route::get('add/{id}','CartController@add')->name('cart.add');
    Route::get('remove/{id}','CartController@remove')->name('cart.remove');
    Route::get('update/{id}/{quantity?}','CartController@update')->name('cart.update');
    Route::get('clear','CartController@clear')->name('cart.clear');
    Route::get('view','CartController@cart_view')->name('cart.view');
    Route::get('checkout','CartController@checkout')->name('cart.checkout');
    Route::post('checkout','CartController@post_checkout')->name('cart.checkout');
});


Route::group(['prefix' => 'order'],function(){
    Route::get('my-order','OrderController@my_order')->name('cart.my_order');
    Route::get('order-detail/{id}','OrderController@order_detail')->name('order.detail');
});


Route::group(['prefix' => 'customer'],function(){
    Route::get('profile','AccountController@profile')->name('customer.profile');
    Route::post('profile','AccountController@post_profile')->name('customer.profile');
    Route::get('register','AccountController@register')->name('customer.register');
    Route::post('register','AccountController@post_register')->name('customer.register');
    Route::get('login','AccountController@login')->name('customer.login');
    Route::post('login','AccountController@post_login')->name('customer.login');
    Route::get('logout','AccountController@logout')->name('customer.logout');
    Route::get('change_password','AccountController@change_password')->name('customer.change_password');
    Route::post('change_password','AccountController@post_change_password')->name('customer.change_password');
});

