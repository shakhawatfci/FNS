<?php 

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){

    Route::get('/', 'ReportingController@dashBoard')->name('admin.dashboard');

    Route::get('logout',['as'=>'admin.logout','uses'=>'Auth\AdminLoginController@logout']);
  
    Route::resource('menu','MenuController');

    Route::get('menu/delete/{id}',['as'=>'menu.delete','uses'=>'MenuController@destroy']);
    Route::resource('category','CategoryController');

    Route::get('category/delete/{id}',['as'=>'category.delete','uses'=>'CategoryController@destroy']);
    Route::resource('sub-category','SubCategoryController');
    Route::get('sub-category/delete/{id}',['as'=>'sub-category.delete','uses'=>'SubCategoryController@destroy']);
    Route::resource('slider','SliderController');

    Route::get('slider/delete/{id}',['as'=>'slider.delete','uses'=>'SliderController@destroy']);
    Route::resource('product','ProductController');
    Route::get('product/delete/{id}',['as'=>'product.delete','uses'=>'ProductController@destroy']); 

    Route::get('product/image/delete/{id}',['as'=>'product.image.delete','uses'=>'ProductController@deletImage']);  

    Route::post('product/quantity/update',['as'=>'quantity.update','uses'=>'ProductController@quantityUpdate']); 

    // order manamgement 

    Route::get('order/pending',['as'=>'order.pending','uses'=>'OrderController@pendingOrder']); 

    Route::get('order/delivered',['as'=>'order.delivered','uses'=>'OrderController@deliveredOrder']);

    Route::get('order/delete/{id}',['as'=>'order.delete','uses'=>'OrderController@destroy']);

    Route::get('order/details/{id}',['as'=>'order.details','uses'=>'OrderController@show']);

    Route::get('order/confirm/{id}',['as'=>'order.confirm','uses'=>'OrderController@confirm_order']);

    Route::get('order/details/delete/{id}',['as'=>'delete.details','uses'=>'OrderDetailsController@destroy']);

    // reporting panel 

    Route::get('Report/all',['as'=>'report.all','uses'=>'ReportingController@index']);
    Route::get('Report/Get',['as'=>'report.get','uses'=>'ReportingController@store']);


    //user panel 

    Route::get('User/Panel',['as'=>'user.panel','uses'=>'UserPanelController@index']);
    Route::get('User/order/{id}',['as'=>'user.order','uses'=>'UserPanelController@show']);
});

Route::get('admin/get-category/{id}',['as'=>'category.get','uses'=>'CategoryController@AjaxCat']);

Route::get('admin/get-subcategory/{id}',['as'=>'subcategory.get','uses'=>'SubCategoryController@AjaxSubCat']);

Route::get('admin/get-product/{id}',['as'=>'product.get','uses'=>'ProductController@AjaxProduct']);

Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');