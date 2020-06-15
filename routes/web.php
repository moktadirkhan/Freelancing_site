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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserProfileController');
Route::get('/profile', 'UserProfileController@profile');
Route::resource('posts', 'PostController');
Route::get('posts/{slug}',[
  'uses'=>'PostController@show',
  'as'=>'discussion'
]);
Route::get('/forum',[
  'uses'=>'ForumController@index',
  'as'=>'forum'
]);
Route::post('/post/reply/{id}',[
  'uses'=>'PostController@reply',
  'as'=>'posts.reply'
]);
Route::get('users/{id}',[
  'uses'=>'UserProfileController@show',
  'as'=>'users.show'
]);
Route::post('/users/orders/{id}',[
  'uses'=>'UserProfileController@order',
  'as'=>'users.order'
]);
Route::resource('orders', 'OrderController');
Route::post('/orders/store/{id}',[
  'uses'=>'OrderController@store',
  'as'=>'orders.store'
]);
Route::get('/customer-orders',[
  'uses'=>'OrderController@Customerindex',
  'as'=>'orders.Customerindex'
]);
