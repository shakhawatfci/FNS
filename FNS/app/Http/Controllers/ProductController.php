<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Menu;
use App\Size;
use App\ProductSize;
use App\product_images;
use App\OrderDetails;
use Validator;
use Session;
use View;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

          
      if(request()->ajax()){
          
          $menu = $request->menu;
          $category = $request->category;
          $sub_category = $request->sub_category;
          $code = $request->code;
         
          $product = Product::orderBy('id','desc');

          if($menu != ''){
            
            $product->where('menu_id','=',$menu);

          }    


          if($category != ''){
            
            $product->where('category_id','=',$category);

          }   

         if($sub_category != ''){
            
            $product->where('sub_category_id','=',$sub_category);

          }       


          if($code != ''){
            
            $product->where('product_code','LIKE','%'.$code.'%');

          }

          $product = $product->paginate(12);

          return View::make('admin.product.paginate',[
               
               'product'=>$product
          ]);
        }

        $menu = Menu::orderBy('menu_name','ASC')->get();
           
        $product = Product::orderBy('id','desc')->paginate(12);   
        return view('admin.product.manage_product',[
            
            'menu' => $menu,
            'product' => $product

        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::where('status','=',1)->get();
        $sizes = Size::orderBy('sizes','desc')->get();
        return view('admin.product.create_product',[
            'menu'=>$menu,
            'sizes'=>$sizes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'menu' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'name' => 'required',
            'code' => 'required|unique:product,product_code',
            'buying_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'selling_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'quantity'=>'required|integer',
            'imgreq'=>'required|mimes:jpeg,jpg,png',
        ]);
        if($validator->fails()){
           
           Session::flash('error','Validation Error!');

           return redirect()->back()->withErrors($validator)->withInput();

        }
        $product = new Product;
        $product->menu_id = $request->menu; 
        $product->category_id = $request->category; 
        $product->sub_category_id = $request->subcategory; 
        $product->product_name = $request->name; 
        $product->product_code = $request->code; 
        $product->buying_price = $request->buying_price; 
        $product->selling_price = $request->selling_price; 
        $product->quantity = $request->quantity; 
        $product->current_quantity = $request->quantity; 
        $product->discount = $request->discount ? $request->discount : 0; 
        $product->size_status = '1';
        $product->short_description = $request->shortdesc; 
        $product->description = $request->description; 
        $product->total_view = '0';
        $product->total_sold = '0';
        $product->status = '1';
        $product->admin_id = Auth::guard('admin')->user()->id;
        $image=$request->file('imgreq');

        if ($image) {
            $img_name = uniqid().'.'.$request->file('imgreq')->getClientOriginalExtension();
            $request->file('imgreq')->move('productImage',$img_name);
            $product->product_image  = $img_name;

         } 
        $product->save();
        $last_id = Product::orderBy('id','desc')->first();
        if ($request->size) {
            foreach ($request->size as $size){
                $data = $size;
                $size_data = new ProductSize;
                $size_data->product_id = $last_id->id;
                $size_data->size_id = $data;
                $size_data ->save();
               
            }
        }

        if($request->file('imgopt'))
        {
            foreach($request->file('imgopt') as $media)
            { 
                if(!empty($media))
                {

                $rand = rand(1000,9999); 
                $destinationPath = 'productImage';
                $filename = uniqid().'_'.$rand.'.'.$media->getClientOriginalExtension();
                $media->move($destinationPath, $filename);
                $image_data = new product_images;
                $image_data->product_id = $last_id->id;
                $image_data->image = $filename;
                $image_data ->save();
                }
            }
        }
        Session::flash('success','Insert success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $menu = Menu::all();

        $category = Category::where('menu_id','=',$product->menu_id)->get();

        $sub_category = SubCategory::where('category_id','=',$product->category_id)->get();

        $size = Size::all();
        $product_image  = product_images::where('product_id','=',$id)->get();


        $product_size = ProductSize::where('product_id', $id)->pluck('size_id')->toArray();
      
      // get current quantity 

         $sold_quantity = OrderDetails::where('product_id','=',$id)->sum('sold_quantity');

         $stock_qty =  $product->quantity;

         $current_quantity = $stock_qty-$sold_quantity;



        return view('admin.product.edit_product',[
            'product'=>$product,
            'size'=>$size,
            'product_size'=>$product_size,
            'menu'=>$menu,
            'category'=>$category,
            'sub_category'=>$sub_category,
            'product_image'=>$product_image,
            'current_quantity'=>$current_quantity,
        ]);
    }

   // product quantity update 


    public function quantityUpdate(Request $request){

        $product = Product::find($request->id);
      
            $validator = Validator::make($request->all(),[
             'quantity' => 'required|integer|min:0',
             'type' => 'required',
            ]);


            if($validator->fails()){
                  
                  Session::flash('error','Validation Error');

                  return redirect()->back();
            }
            
            // increase 

            if($request->type == 1){

              $product->quantity = $product->quantity + $request->quantity;

              $product->update();

            }

            // decrease 

            if($request->type == 2){

              if($request->quantity > $request->current_quantity){ 
                
                Session::flash('error','Cannot Update ! Request Quantity Is Greater Then Current Quantity');

                return redirect()->back();
                
              }
              else{

              $product->quantity = $product->quantity - $request->quantity;
              $product->update(); 
              }

           

            }
     
     Session::flash('success','Quantity Updated');

     return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'menu' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'name' => 'required',
            'code' => 'required',
            'buying_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'selling_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'imgreq'=>'nullable|mimes:jpeg,jpg,png,gif',
        ]);
        if($validator->fails()){
           
           Session::flash('error','Validation Error!');

           return redirect()->back()->withErrors($validator)->withInput();

        }
        $product = Product::find($id);
        $product->menu_id = $request->menu; 
        $product->category_id = $request->category; 
        $product->sub_category_id = $request->subcategory; 
        $product->product_name = $request->name; 
        $product->product_code = $request->code; 
        $product->buying_price = $request->buying_price; 
        $product->selling_price = $request->selling_price;  
        $product->discount = $request->discount ? $request->discount : 0; 
        $product->short_description = $request->shortdesc; 
        $product->description = $request->description; 
        $product->status = $request->status;
        $image=$request->file('imgreq');

        if ($image) {

            if(file_exists('productImage/'.$product->product_image) && !empty($product->product_image)){

                unlink('productImage/'.$product->product_image);

            }

            $img_name = uniqid().'.'.$request->file('imgreq')->getClientOriginalExtension();
            $request->file('imgreq')->move('productImage',$img_name);
            $product->product_image  = $img_name;

         } 
        $product->update();

        if ($request->size) {
        // delete previous size before new size update
            ProductSize::where('product_id','=',$id)->delete();
            foreach ($request->size as $size){
                $data = $size;
                $size_data = new ProductSize;
                $size_data->product_id = $id;
                $size_data->size_id = $data;
                $size_data ->save();
               
            }
        }

        if($request->file('imgopt'))
        {
            foreach($request->file('imgopt') as $media)
            { 
                if(!empty($media))
                {

                $rand = rand(1000,9999); 
                $destinationPath = 'productImage';
                $filename = uniqid().'_'.$rand.'.'.$media->getClientOriginalExtension();
                $media->move($destinationPath, $filename);
                $image_data = new product_images;
                $image_data->product_id = $id;
                $image_data->image = $filename;
                $image_data ->save();
                }
            }
        }

        Session::flash('success','Update success');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $order_count = OrderDetails::where('product_id','=',$id)->count();

        if($order_count>0){
         
         Session::flash('error','You Can\'t Delete This Product It Has Order Delete Order First');

         return redirect()->back();

        }


        $product_size = ProductSize::where('product_id','=',$id)->delete();

        // $product_size->delete();

        $product_image = product_images::where('product_id','=',$id)->get();

        if(count($product_image)>0){

            foreach ($product_image as  $value) {
                
               if(file_exists('productImage/'.$value->image) && !empty($value->image)){
                  
                  unlink('productImage/'.$value->image);
               } 
            }

        product_images::where('product_id','=',$id)->delete();
        }


        
        if(file_exists('productImage/'.$product->product_image) && !empty($product->product_image)){
           
           unlink('productImage/'.$product->product_image);

        }

        $product->delete();


        Session::flash('success','Delete Successful!');

        return redirect()->back();


        



    }

    public function deletImage($id){

        $product_image = product_images::find($id);

               if(file_exists('productImage/'.$product_image->image) && !empty($product_image->image)){
                  
                  unlink('productImage/'.$product_image->image);
               }

               $product_image->delete();

       Session::flash('success','Image Deleted!');
       
       return redirect()->back();          
    }


    public function AjaxProduct($id){
         
         $product = Product::where('sub_category_id','=',$id)->get();

         return View::make('admin.product.ajax_product',['product'=>$product]);

    }
}
