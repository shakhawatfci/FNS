<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
   protected $table = 'product';
   // realation with menu 

	public function menu(){


		return $this->belongsTo('App\Menu');
	}


	public function category(){

		return $this->belongsTo('App\Category');
	}


	public function sub_category(){

		return $this->belongsTo('App\SubCategory');
	}


	public function order_details(){

		return $this->hasMany('App\OrderDetails');
	}

	// realtion with rating 

	public function rating(){

         return $this->hasMany('App\Rating');
	}


	// relation with  product size

	public function product_size(){

		return $this->hasMany('App\ProductSize');
	}

	// relation with color 

	public function product_color(){

		return $this->hasMany('App\ProductColor');
	}	


	// relation with product image 

	public function product_image(){

		return $this->hasMany('App\product_images');
	}

	// relation with  product size

	
}
