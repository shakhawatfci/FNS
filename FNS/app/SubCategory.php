<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    

    protected $table = 'sub_category';
   

    // relation with category

    public function category(){

    	return $this->belongsTo('App\Category');
    }  


    // relation with menu

    public function menu(){

    	return $this->belongsTo('App\Menu');
    }

    // realtion with product 

    public function product(){

    	return $this->hasMany('App\Product');
    }
}
