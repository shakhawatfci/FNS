<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_size';


    // relation with product

   public function product(){


    return $this->belongsTo('App\Product');

   }

   // relation with size 


   public function size(){
        
        return $this->belongsTo('App\Size','size_id');
   }
}
