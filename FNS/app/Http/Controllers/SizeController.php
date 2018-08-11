<?php

namespace App\Http\Controllers;

use App\Size; 
use App\ProductSize; 
use Illuminate\Http\Request;
use Validator;
use Session;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::orderBy('sizes','desc')->paginate();
        return view('admin.sizes.sizes',[
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
           
           'sizes' => 'required|unique:sizes,sizes'
       ]); 

       if($validator->fails()){
          
         Session::flash('error','Validation Errors'); 
         return redirect()->back()->withErrors($validator);
       }

       $sizes = new Size;

       $sizes->sizes = $request->sizes;
       $sizes->save();

       Session::flash('success','Size Added Successfully');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
           
           'sizes' => 'required|unique:sizes,sizes'
       ]); 

       if($validator->fails()){
          
         Session::flash('error','Validation Errors'); 
         return redirect()->back()->withErrors($validator);
       }


        $size = Size::find($id);

        $size->sizes = $request->sizes;


        $size->update();

        Session::flash('success','Update Successful');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = ProductSize::where('product_id','=',$id)->count();

      if($check>0){

        Session::flash('error','Can not Delete It has Product first Delete them');

        return redirect()->back();

      }

      $menu = Size::find($id);

      $menu->delete();

      Session::flash('success','Delete Successful!');

      return redirect()->back();
    }
}
