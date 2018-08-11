<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $table = 'orders';
    
    //relation with order_details
   

   public function order_details(){

     
     return $this->hasMany('App\OrderDetails');

   }


   // relation with user 

   public function  user(){
    
    return $this->belongsTo('App\User');

   }



}
