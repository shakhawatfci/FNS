<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\AllStatic;
use Illuminate\Http\Request;
use Session;
use View;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    


    }


    // pending order 

    public function pendingOrder(Request $request){
      
      if(request()->ajax()){

        $order_id = $request->order_id;
        $status = $request->status;
        $date = $request->date;
           
        $order = Order::orderBy('id','desc');

        if($status != ''){
         
          $order->where('status','=',$status);

        }
        
        if($order_id != ''){
            
            $order->where('id','LIKE','%'.$order_id.'%');
        }  

        if($date != ''){

            $original_date = explode('-',$date);

            $date1 = date("Y-m-d", strtotime($original_date[0]));
            $date2 = date("Y-m-d", strtotime($original_date[1]));
            
            $order->whereBetween('order_date',[$date1,$date2]);
        }  

        $order = $order->paginate(10);
         
        return View::make('admin.order.pending_paginate',['order'=>$order]); 


      }
       $order = Order::orderBy('id','desc')->paginate(10);

      return view('admin.order.pending_order',['order'=>$order]);


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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        $order_details = OrderDetails::where('order_id','=',$id)->get();

        return view('admin.order.order_details',[
            'order'=>$order,
            'order_details'=>$order_details,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }


    public function confirm_order($id){

        $order = Order::find($id);

        $order->status = AllStatic::$delivered;
        $order->order_delivery_date = date('Y-m-d');

        $order->update();

        OrderDetails::where('order_id','=',$id)->update(['order_status'=>AllStatic::$delivered]);

        Session::flash('success','Order Confirmed !');

        return redirect()->route('order.pending');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {

      $order = Order::find($id);

      $order->delete();

      OrderDetails::where('order_id','=',$id)->delete();

      Session::flash('success','Delete Successful');

      return redirect()->route('order.pending');  

    }
}
