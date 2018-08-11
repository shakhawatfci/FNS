<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderDetails;
use App\User;
use App\AllStatic;
use Cart;
use Session;
use Auth;
use Validator;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cart = Cart::content();
        return view('pages.view_cart',[
          
          'cart'=>$cart

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    // cart adding 

    public function CartAdd(Request $request){

         $id = $request->id;
         $size = $request->size;
         $color = $request->color;
         $qty  = $request->qty;
          
         $price = $request->price; 
         if($qty == '' || $qty == 0){
          
          $qty = 1;
         }

         $product = Product::find($id);

        $sold_quantity = OrderDetails::where('product_id','=',$id)->sum('sold_quantity');



         if($qty > $product->quantity ||  $sold_quantity+$qty > $product->quantity){
            
            Session::flash('warning','Product Quantity Not Available');

            return redirect()->back();
         }

         if($size != ''){
          
          Cart::add(['id' => $id, 'name' =>$product->product_name, 'qty' => $qty, 'price' =>$price, 'options' => ['size' =>$size]]);


         }

         else{

            Cart::add(['id' => $id, 'name' =>$product->product_name, 'qty' => $qty, 'price' =>$price]);
         }
        
        Session::flash('success','Item Added!');
        return redirect()->back();

         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
       if($request->qty<=0){

          Session::flash('warning','Quantity Can\'t be Null');

          return redirect()->back();
       }

         $product = Product::find($request->product_id);

         $sold_quantity = OrderDetails::where('product_id','=',$request->product_id)->sum('sold_quantity');

         if($request->qty > $product->quantity || $product->quantity < $sold_quantity+$request->qty){
            
            Session::flash('warning','Product Quantity Not Available');

            return redirect()->back();
         }

        Cart::update($id,$request->qty);

        Session::flash('success','Quantity Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        Session::flash('success','Item Removed !');

        return redirect()->back();
    }

   public function checkout()
    {
         
        
        return view('pages.checkout');
    }


   public function OrderPlace(Request $request){
     
     $validator = Validator::make($request->all(),[
     
       'name'=>'required',
       'address'=>'required',
       'phone'=>'required|regex:/(01)[0-9]{9}/',
       'transection_id'=>'nullable|unique:orders',
 
     ]);

     if($validator->fails()){
      
      Session::flash('error','Validation Error');

      return redirect()->back()->withErrors($validator);

     }

     if($request->payment_method != AllStatic::$cash && $request->transection_id == '' ){
        
        Session::flash('errro','Transection Id Required When Payment Method Is Not Cash');

        return redirect()->back();

     }


     $order_id =  order_id();

     $order = new Order;

     $order->id = $order_id;
     $order->name = $request->name;
     $order->phone = $request->phone;
     $order->address = $request->address;
     $order->transection_id = $request->transection_id;
     $order->payment_type = 0;
     $order->status = 0;
     $order->payment_location = $request->location;
     $order->payment_method = $request->payment_method;
     $order->order_date = date('Y-m-d');
     $order->user_id = Auth::user()->id;

     if($request->location == AllStatic::$inside_dhaka){
          
      $order->delivery_cost = 50;    
     }
     else{
      
       $order->delivery_cost = 80; 

     }


     $order->save();
     
     $date = date('Y-m-d');

     // cart item add in order details 

     foreach (Cart::content()  as  $value) {
         
         $product = Product::find($value->id);

         $total_buying_price = $value->qty * $product->buying_price;  
         $total_sold_price = $value->qty * $value->price;  

         $order_details = new OrderDetails;

         $order_details->order_id = $order_id;
         $order_details->menu_id = $product->menu_id;
         $order_details->category_id = $product->category_id;
         $order_details->sub_category_id = $product->sub_category_id;
         $order_details->buying_price = $product->buying_price;
         $order_details->product_id = $value->id;
         $order_details->sold_quantity = $value->qty;
         $order_details->sold_price = $value->price;
         $order_details->total_buying_price = $total_buying_price;
         $order_details->total_sold_price = $total_sold_price;
         $order_details->user_id = Auth::user()->id;
         $order_details->sold_date = $date;
         $order_details->order_status = 0;
         $order_details->payment = 0;

         $order_details->product_size = $value->options->has('size') ? $value->options->size : 'No size';
         
         $order_details->save();
     }


     // information save for next time 

     if($request->save_info == 1){ 

        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->update();

     }
       

      Cart::destroy(); 

     Session::flash('success','Your Order Complete!');

     return redirect()->route('user.profile')->withInput(['tab'=>'list']);


   } 
}
