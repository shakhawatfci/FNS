<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Menu;
use Validator;
use Session; 
use View;
use Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       

        if(request()->ajax()){
         
          $menu_id = $request->menu;
        $category_id = $request->category;
        $name = $request->sub_cat_name;
        
         $sub_category =  SubCategory::orderBy('id','desc');

         if($menu_id != ''){
         
           $sub_category->where('menu_id','=',$menu_id);

         }    

         if($category_id != ''){
         
           $sub_category->where('category_id','=',$category_id);

         }    

         if($name != ''){
         
           $sub_category->where('sub_category_name','LIKE','%'.$name.'%');

         }

         $sub_category = $sub_category->paginate(10);

         return View::make('admin.sub-category.sub_category_paginate',['sub_category'=>$sub_category]);


        }

        
        $menu = Menu::all();

        $sub_category = SubCategory::orderBy('id','desc')->paginate(10);

        return view('admin.sub-category.manage_sub_category',[
         'sub_category' => $sub_category,
         'menu'=> $menu
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

        return view('admin.sub-category.create_sub_category',[
           'menu' => $menu
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
          
          'menu'=>'required',
          'category'=>'required',
          'sub_category_name'=>'required'

        ]);

        if($validator->fails()){

           Session::flash('error','Validation Error!');

           return redirect()->back()->withErrors($validator);
        }

        $category = new SubCategory;

        $category->menu_id  = $request->menu;
        $category->category_id  = $request->category;

        $category->sub_category_name  = $request->sub_category_name;
        $category->home_view  = $request->home_view;
        $category->admin_id = Auth::guard('admin')->user()->id;

        $category->save();

        Session::flash('success','Category Created !');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {


    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $sub_category = SubCategory::find($id); 

        $menu = Menu::all();

        $category = Category::where('menu_id','=',$sub_category->menu_id)->get();

        return view('admin.sub-category.edit_sub_category',[
            'sub_category' => $sub_category,
            'menu' => $menu,
            'category' => $category
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            $validator = Validator::make($request->all(),[
          
          'menu'=>'required',
          'category'=>'required',
          'sub_category_name'=>'required'

        ]);

        if($validator->fails()){

           Session::flash('error','Validation Error!');

           return redirect()->back()->withErrors($validator);
        }

        $category =  SubCategory::find($id);

        $category->menu_id  = $request->menu;
        $category->category_id  = $request->category;

        $category->sub_category_name  = $request->sub_category_name;
        $category->home_view  = $request->home_view;
        $category->status  = $request->status;
     

        $category->update();

        Session::flash('success','Category Updated !');

        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $check = Product::where('sub_category_id','=',$id)->count();

        if($check>0){
          
          Session::flash('error','Can not delete this category bcz it has product');

        }


         $category = SubCategory::find($id);

         $category->delete($id);

         Session::flash('success','Delete Successful');

         return redirect()->back();

    }
    public function AjaxSubCat($id){

        $subcategory = SubCategory::where('category_id','=',$id)->where('status','=',1)->get();
        return View::make('admin.sub-category.ajax_subcategory',['subcategory'=>$subcategory]);


    }
}
