<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
   protected $table = 'order_detail';

   public function order(){

   	  return $this->belongsTo('App\Order');
   }


   public function user(){

   	  return $this->belongsTo('App\User');
   }   


   public function product(){

   	  return $this->belongsTo('App\Product');
   }
}
