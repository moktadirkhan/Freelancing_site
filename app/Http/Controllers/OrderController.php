<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use App\Drive_link;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usid=Auth::user()->id;
      $showdata=DB::table("users")
      ->join('orders','orders.profile_id','users.id')
      ->select('orders.*')
      ->where('orders.profile_id',$usid)

      ->get();
        return view('order_list.index',compact('showdata'));

    }
    public function Customerindex()
    {
      $usid=Auth::user()->id;
      $showdata=DB::table("orders")
      ->join('drive_link','drive_link.profile_id','orders.user_id')
      ->select('drive_link.*')
      ->where('drive_link.profile_id',$usid)

      ->get();
        return view('order_list.create',compact('showdata'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("order_list.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
    //  'order_id','profile_id','date_limit','description','money','user_id'
    $usid=Auth::user()->id;
    $this->validate(request(),[
  'content'=>'required',

    ]);

    $discuss=Drive_link::create([


  'profile_id'=>$id,

  'content'=>request()->content,


  'user_id'=>$usid
]);
session()->flash('success','Project Link Posted successfully');

return redirect('/forum');

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
