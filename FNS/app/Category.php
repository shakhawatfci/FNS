<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  
  protected $table = 'category';

    // relation with menu 


    public function menu(){

    	return $this->belongsTo('App\Menu');
    }

    // relation with sub_Cateogry

    public function sub_category(){

    	return $this->hasMany('App\SubCategory');
    }

    // relation with product 

    public function product(){

    	return $this->hasMany('App/Product');
    }
}
