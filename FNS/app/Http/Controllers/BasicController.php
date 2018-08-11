<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Category;
use App\SubCategory;
use App\product_images;
use App\ProductSize;
use App\Slider;
use App\Product;
use App\Order;
use Auth;
use View;

class BasicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $slider = Slider::orderBy('id','desc')->take(10)->get();
        $latest_product = Product::orderBy('id','desc')->take('15')->get();
         
        $category = Category::where('home_view','=',1)
        ->where('status','=',1)
        ->orderBy('updated_at','desc')
        ->get();

        $sub_category = SubCategory::where('home_view','=',1)
        ->where('status','=',1)
        ->orderBy('updated_at','desc')
        ->get();
        return view('welcome',[
            'slider'=>$slider,
            'latest_product'=>$latest_product,
            'category'=>$category,
            'sub_category'=>$sub_category,

        ]);
    }

    // menu product
    public function menuProduct()
    {
        return view('pages.menu_product');
    }

    // category product
    public function categoryProduct(Request $request,$id,$name)
    {

     
       if(request()->ajax()){
         
         $start_price = $request->amount1; 
         $end_price = $request->amount2;

         $category_id = $request->category; 

         $sub_category_id = [];
         $sub_category_id = $request->sub_category; 
         // $page = $request->page_number; 

         $product = Product::orderBy('id','desc')->where('status','=',1)->where('category_id','=',$category_id);

         if($sub_category_id){
           
           $product->whereIn('sub_category_id',explode(',',$sub_category_id)); 

         }

         if($end_price>0){
           
           $product->whereBetween('selling_price',[$start_price,$end_price]);

         }

         $product = $product->paginate(9);

         return View::make('pages.category_product_paginate',[
          'product' => $product
         ]);
       }


        $product_category = Category::find($id);

        $product_subcategory = SubCategory::orderBy('id','ASC')
        ->where('category_id','=',$id)
        ->get();

        $product = Product::orderBy('id','desc')
        ->where('category_id','=',$id)
        ->where('status','=',1)
        ->paginate(9);

       return view('pages.category_product',[
        'product_category'=>$product_category,
        'product_subcategory'=>$product_subcategory,
        'product'=>$product,
       ]);
    }

    //sub category product
    public function subCategoryProduct(Request $request,$id,$name)
    { 
          
        if(request()->ajax()){
         
         $start_price = $request->amount1; 
         $end_price = $request->amount2;

         $sub_category_id = $request->sub_category; 

         $product = Product::orderBy('id','desc')->where('status','=',1)->where('sub_category_id','=',$sub_category_id);

         if($end_price>0){
          
          $product->whereBetween('selling_price',[$start_price,$end_price]);

         }

         $product = $product->paginate(9);

         return View::make('pages.sub_category_product_paginate',['product'=> $product]);

        }

        $subcategory = SubCategory::find($id);
        $product = Product::orderBy('id','desc')->where('sub_category_id','=',$id)
        ->where('status','=',1)
        ->paginate(9);
        return view('pages.subcategory_product',[
            'product'=>$product,
            'subcategory'=>$subcategory,

        ]);
    }

    // Product details
    public function productDetails($id,$name)
    {
        $product = Product::find($id);


        $product->total_view = $product->total_view + 1;
        $product->update(); 
        $product_image = product_images::where('product_id','=',$product->id)->get();
        $product_size = ProductSize::where('product_id','=',$product->id)->get();
        return view('pages.product_details',[

            'product'=>$product,
            'product_image'=>$product_image,
            'product_size'=>$product_size,
        ]);
    }

    // Product details
    public function viewCart()
    {
        return view('pages.view_cart');
    }

    public function profile(){
        $order = Order::where('user_id','=',Auth::user()->id)->get();

        return view('pages.profile',[
            'order'=>$order,
        ]);
    }
    


    // registration page
    public function registration()
    {
        return view('pages.registration');
    } 

    // contact page
    public function contact()
    {
        return view('pages.contact_us');
    }


  
    public function checkout()
    {
        return view('pages.checkout');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
