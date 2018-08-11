<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_images extends Model
{
    protected $table = 'product_images';

    // relation with product 


    public function product(){

    	return $this->belongsTo('App\Product');
    }
}
