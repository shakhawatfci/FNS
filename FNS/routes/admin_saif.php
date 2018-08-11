<?php 

 // saif route file


// backend
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){

  // slider part
  Route::resource('slider','SliderController');
  Route::get('slider/edit/{id}',['as'=>'slider.edit','uses'=>'SliderController@edit']);
  Route::put('slider/update/{id}',['as'=>'slider.update','uses'=>'SliderController@update']);
  Route::get('slider/delete/{id}',['as'=>'slider.delete','uses'=>'SliderController@destroy']); 
  // size part
  Route::resource('sizes','SizeController');  
  Route::get('sizes/delete/{id}',['as'=>'sizes.destroy','uses'=>'SizeController@destroy']); 

  // product part
  Route::resource('product','ProductController');

});