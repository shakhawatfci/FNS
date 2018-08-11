<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Order;
use App\OrderDetails;
use App\User;
use App\AllStatic;
use Session;
use View;
use Validator;
use DB;

class ReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $menu = Menu::orderBy('menu_name','ASC')->get();
       $category = Category::orderBy('category_name','ASC')->get();
       $sub_category = SubCategory::orderBy('sub_category_name','ASC')->get();


       return view('admin.report.report',[
         'menu'=>$menu,
         'category'=>$category,
         'sub_category'=>$sub_category,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = $request->menu;
        $category = $request->category;
        $sub_category = $request->subcategory;
        $product = $request->product;
         $start_date = $request->start_date;
         $end_date = $request->end_date;
        $type = $request->type;


        if($start_date != '' && $end_date == ''){

            Session::flash('error','Both Date Are Required');

            return redirect()->back();
        }

        if($start_date == '' && $end_date != ''){
         Session::flash('error','Both Date Are Required');
            return redirect()->back();

        }

        // report for stock 

        if($type == 'stock'){
           
           $stock = Product::orderBy('id','desc');
             
            if($menu != ''){

               
               $stock->where('menu_id','=',$menu);
                

            }

            if($category != ''){
               
              $stock->where('category_id','=',$category); 

            }

            if($sub_category != ''){
               
          
               $stock->where('sub_category_id','=',$sub_category);

            }

            if($product != ''){
                
                $stock->where('id','=',$product);

            }

            if($end_date != ''){
           
                $s_date = $start_date.' 00:01:01';
                $e_date = $end_date.' 11:59:59';

                $stock->whereBetween('created_at',[$s_date,$e_date]);

            }

            $stock = $stock->get();
           

           return view('admin.report.stock_report',['stock'=>$stock]);


        }

        // report for sell 

        if($type == 'sell'){
         $sell = OrderDetails::orderBy('id','desc');
             
            if($menu != ''){

               
               $sell->where('menu_id','=',$menu);
                

            }

            if($category != ''){
               
              $sell->where('category_id','=',$category); 

            }

            if($sub_category != ''){
               
          
               $sell->where('sub_category_id','=',$sub_category);

            }

            if($product != ''){
                
                $sell->where('product_id','=',$product);

            }

            if($end_date != ''){

                $sell->whereBetween('sold_date',[$start_date,$end_date]);

            }

           $sell = $sell->get();
           

           return view('admin.report.sell_report',['sell'=>$sell]);
        }


        // report for profit 

        if($type == 'profit'){
            
            $sell = OrderDetails::select('product_id',DB::raw('sum(sold_quantity) as total_sold_quantity'),DB::raw('sum(total_buying_price) as total_buying_price'),DB::raw('sum(total_sold_price) as total_sold_price'))->orderBy('id','desc');
    
             
            if($menu != ''){

               
               $sell->where('menu_id','=',$menu);
                

            }

            if($category != ''){
               
              $sell->where('category_id','=',$category); 

            }

            if($sub_category != ''){
               
          
               $sell->where('sub_category_id','=',$sub_category);

            }

            if($product != ''){
                
                $sell->where('product_id','=',$product);

            }

            if($end_date != ''){
           
              $sell->whereBetween('sold_date',[$start_date,$end_date]);

            }

            $sell = $sell->groupBy('product_id')->get();

           return view('admin.report.profit_report',['sell'=>$sell]);

        }


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


    public function dashBoard(){
       
       // total report 

       $total_product = Product::count();
       $total_quantity = Product::sum('quantity');
       $total_sold_quantity = OrderDetails::sum('sold_quantity');
       $current_quantity = $total_quantity - $total_sold_quantity;

       $total_sell = OrderDetails::sum('total_sold_price');
       $total_buying_price = OrderDetails::sum('total_buying_price');

       $total_profit = $total_sell - $total_buying_price;

       $total_user = User::count();
       $total_pending_order = Order::where('status','=',AllStatic::$pending)->count();
       $total_delivered_order = Order::where('status','=',AllStatic::$delivered)->count();

       // today report 

       return view('index',[
         'total_product' => $total_product,  
         'total_quantity' => $total_quantity,  
         'total_sold_quantity' => $total_sold_quantity,  
         'current_quantity' => $current_quantity,  
         'total_sell' => $total_sell,  
         'total_profit' => $total_profit,  
         'total_user' => $total_user,  
         'total_pending_order' => $total_pending_order,  
         'total_delivered_order' => $total_delivered_order,  
       ]);

    }
}
