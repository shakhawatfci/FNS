<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';


    // realation with product_size 


    public function product_size(){

    	return $this->hasMany('App\ProductSize','size_id','id');
    }


}
 