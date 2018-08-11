<?php

namespace App\Http\Controllers;

use App\Slider; 
use Illuminate\Http\Request;
use Validator;
use Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderBy('id','desc')->get();
        return view('admin.slider.manage_slider',[

            'slider'=>$slider,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create_slider');
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
            // 'title' => 'required',
            'link' => 'required',
            'img'=>'required|mimes:jpeg,jpg,png',
            
            

        ]);
        if($validator->fails()){
           
           Session::flash('error','Validation Error!');

           return redirect()->back()->withErrors($validator)->withInput();

        }
        $slider = new Slider;
        $slider->title = $request->title; 
        $slider->link = $request->link; 
        
        $image=$request->file('img');
        

        if ($image) {
            $img_name = uniqid().'.'.$request->file('img')->getClientOriginalExtension();
            $request->file('img')->move('sliderImage',$img_name);
            $slider->image = $img_name;

         } 
         $slider->save();
         Session::flash('success','Insert success');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit_slider',[
            'slider'=>$slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            // 'title' => 'required',
            'link' => 'required',
        ]);
        if($validator->fails()){
           
           Session::flash('error','Validation Error!');

           return redirect()->back()->withErrors($validator)->withInput();

        }
        $slider = slider::find($id);
        $slider->title = $request->title;
        $slider->link = $request->link;
        $image=$request->file('img');

        if ($image) {
            if (file_exists('sliderImage/'.$slider->image) && $slider->image!=null) {
                unlink('sliderImage/'.$slider->image);
            }
            $img_name = uniqid().'.'.$request->file('img')->getClientOriginalExtension();
            $request->file('img')->move('sliderImage',$img_name);
            $slider->image= $img_name;
        }
        $slider->update();
        Session::flash('success','Update successfully done');
        return redirect()->route('slider.index');
        
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Slider::find($id);
        if (file_exists('sliderImage/'.$data->image) && $data->image!=null) {
            unlink('sliderImage/'.$data->image);
        }
        $data->delete();
        Session::flash('success','successfully deleted');
        return redirect()-> back();
    }
}
