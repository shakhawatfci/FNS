<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Order;

use View;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(request()->ajax()){
            $user = User::orderBy('id','desc');
            $title = $request->title;

            if($title){
               
               $user->where('name','LIKE','%'.$title.'%')
                    ->orWhere('email','LIKE','%'.$title.'%')
                    ->orWhere('phone','LIKE','%'.$title.'%');
            }

            $user = $user->paginate(10);

            return View::make('admin.user.user_paginate',['user'=>$user]);
        }

        $user = User::orderBy('id','desc')->paginate(10);

        return view('admin.user.user_list',['user'=>$user]);
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
        $user = User::find($id);

        $order = Order::where('user_id','=',$id)->get();


        return view('admin.user.user_order',['user'=>$user,'order'=>$order]);
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
