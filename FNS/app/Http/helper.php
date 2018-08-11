<?php 

/**
 * @mixin \Eloquent
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
function getProductImage($id){
 

 $image =  DB::table('product')->select('product_image')->where('id','=',$id)->first();

 return $image->product_image;

}

function order_id(){
 

 $data  =  DB::table('orders')->select('id')->orderBy('id','desc')->first();
 

 $code = 1001;
 
 if($data){
   
   $code = $data->id+1;

 }



 return $code;


}

function get_order_total($order_id,$delivery_cost){

  
 
 $price  = DB::table('order_detail')->where('order_id','=',$order_id)->sum('total_sold_price');

 return $price+$delivery_cost;

}


function get_sold_quantity($product_id){

   
   $sold_quantity = DB::table('order_detail')->where('product_id','=',$product_id)->sum('sold_quantity');

   return $sold_quantity;

}

function user_order($id){

	$order = DB::table('orders')->where('user_id','=',$id)->count();

	return $order;
}


?>