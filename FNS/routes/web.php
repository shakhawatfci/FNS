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

// front end
Route::get('/','BasicController@index');

// slider part

// menu product part
Route::get('Menu/Product/{id}',['as'=>'menu.product','uses'=>'BasicController@menuProduct']);

// Category product
Route::get('Category/Product/{id}/{name?}',['as'=>'category.product','uses'=>'BasicController@categoryProduct'])->where('name', '(.*)');

// Sub category product
Route::get('SubCategory/Product/{id}/{name?}',['as'=>'subcategory.product','uses'=>'BasicController@subcategoryProduct'])->where('name', '(.*)');

// Detailed product
Route::get('Product/Details/{id}/{name?}',['as'=>'product.details','uses'=>'BasicController@productDetails'])->where('name', '(.*)');

// contact page
Route::get('contact-us',['as'=>'contact.us','uses'=>'BasicController@contact']);



Route::get('Cart/View',['as'=>'view.cart','uses'=>'BasicController@viewCart']);




// cart 

Route::resource('cart','CartController');

Route::get('update/cart',['as'=>'update.cart','uses'=>'CartController@update']);

Route::get('Cart/Remove/row_id/{id}',['as'=>'cart.remove','uses'=>'CartController@destroy']);

Route::get('add/to/cart',['as'=>'cart.add','uses'=>'CartController@CartAdd']);

// user login panel 

Route::group(['middleware'=>'auth'],function(){
 
 Route::get('checkout',['as'=>'cart.checkout','uses'=>'CartController@checkout']);
 Route::post('checkout/order',['as'=>'cart.order','uses'=>'CartController@OrderPlace']);
 Route::get('logout','UserController@logout');
 Route::get('user/profile',['as'=>'user.profile','uses'=>'BasicController@profile']);

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
