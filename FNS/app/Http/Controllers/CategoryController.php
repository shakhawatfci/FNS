<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\Menu; 
use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use View;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $category = Category::orderBy('id','desc')->get();


        return view('admin.category.manage_category',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $menu =  Menu::where('status','=',1)->get();

        return view('admin.category.create_category',['menu'=>$menu]);
        
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
          'category_name' => 'required',
        ]);

        if($validator->fails()){
           
           Session::flash('error','Validation Error!');

           return redirect()->back()->withErrors($validator)->withInput();

        }

        $category = new Category;

        $category->menu_id = $request->menu;
        $category->category_name = $request->category_name;
        $category->home_view = $request->home_view;
        $category->admin_id = Auth::guard('admin')->user()->id;



        $category->save();

        Session::flash('success','Category Added');
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::where('status','=',1)->get();
        $category = Category::find($id);

        return view('admin.category.edit_category',['menu'=>$menu,'category'=>$category]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
          'menu' => 'required',
          'category_name' => 'required',
        ]);

        if($validator->fails()){
           
           Session::flash('error','Validation Error!');

           return redirect()->back()->withErrors($validator)->withInput();

        }

        $category =  Category::find($id);

        $category->menu_id = $request->menu;
        $category->category_name = $request->category_name;
        $category->home_view = $request->home_view;
        $category->status = $request->status;

        $category->Update();

        Session::flash('success','Update Successful');
        
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       $check = SubCategory::where('category_id','=',$id)->count();

        if($check>0){
          Session::flash('error','You Can not Delete This Category this have SubCategory !');

          return redirect()->back();
        }

        $category = Category::find($id);

        $category->delete();

        Session::flash('success','Delete Successful !');
        return redirect()->back(); 
    }


    public function AjaxCat($id){

        $category = Category::where('menu_id','=',$id)->where('status','=',1)->get();



        return View::make('admin.category.ajax_category',['category'=>$category]);


    }
}
