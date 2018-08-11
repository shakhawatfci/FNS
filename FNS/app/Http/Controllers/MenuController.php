<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menu.mange_menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       $menu = Menu::orderBy('id','desc')->paginate(10);

        return view('admin.menu.create_menu',['menu'=>$menu]);
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
           
           'name' => 'required|unique:menu,menu_name'
       ]); 

       if($validator->fails()){
          
         Session::flash('error','Validation Errors'); 
         return redirect()->back()->withErrors($validator);
       }

       $menu = new Menu;

       $menu->menu_name = $request->name;
       $menu->home_view = 1;
       $menu->status = 1;
       $menu->admin_id = Auth::guard('admin')->user()->id;

       $menu->save();

       Session::flash('success','Menu Added Successfully');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $validator = Validator::make($request->all(),[
          'name'=>'required',
          'status'=>'required'
        ]);

        if($validator->fails()){
          
          Session::flash('error','Name Is required');

          return redirect()->back();
        }

      $menu = Menu::find($id);

      $menu->menu_name = $request->name;

      $menu->status = $request->status;

      $menu->update();

      Session::flash('success','Update Successful');

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 

      $check = Category::where('menu_id','=',$id)->count();

      if($check>0){

        Session::flash('error','Can not Delete It has Category first Delete them');

        return redirect()->back();

      }

      $menu = Menu::find($id);

      $menu->delete();

      Session::flash('success','Delete Successful!');

      return redirect()->back();
       
    }
      
}
