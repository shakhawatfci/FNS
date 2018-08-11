<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';



    // relation with category 


    public function category(){

    	return $this->hasMany('App\Category');
    }   


    // relation with sub_category 


    public function sub_category(){

    	return $this->hasMany('App\SubCategory');
    }


   public function product(){

    	return $this->hasMany('App\Product');
    }
}
