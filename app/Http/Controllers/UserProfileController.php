<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use App\Order;
use App\User_Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserDataRequest;


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return view("users.create");
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(UserDataRequest $request)
     {
       $usid=Auth::user()->id;
       /**if (auth()->user()->role_id == 1) {
          $ustatus="frelancer";
       }
       else {
         $ustatus="customer";
       }**/
         $image=$request->image->store('user_data');//db_name

         User_Data::create([
           'skills'=>$request->skills,
           'work_link'=>$request->work_link,
           'type_of_developer'=>$request->type_of_developer,
           'image'=>$image,
           'bio'=>$request->bio,
           'user_id'=>$usid,

          //'status'=>$ustatus,

         ]);
         session()->flash('success','Profile created successfully');

         return redirect ('/profile');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
       $profile=User_Data::where('user_id',$id)->first();

       return view('users.fprofile')->with('profile',$profile);

     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit(User_Data $User_Data)
     {
         return view('users.create')->with('userse',User_Data::all());
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UserDataRequest $request, User_Data $User_Data)
     {

       $data=$request->only(['skills','work_link', 'type_of_developer','bio','user_id']);
          if ($request->hasFile('image')){
            //check if new image
            $image=$request->image->store('user_data');
            //upload it
           Storage::delete($product->image);
           //delete old one

           $data['image']=$image;
          }
        $product->update($data);


          session()->flash('success','Profile updated successfully');

          return redirect(route('users.index'));
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy()
     {

     }

     public function profile()
     {
       $usid=Auth::user()->id;
       $showdata=DB::table("users")
       ->join('user_data','user_data.user_id','users.id')
       ->select('user_data.*')
       ->where('user_data.user_id',$usid)
       ->take(1)
       ->get();
         return view('users.index',compact('showdata'));
        //return view ('users.index', array('user'=>Auth::user()));
     }

      public function order($id)
      {

        $usid=Auth::user()->id;
        $this->validate(request(),[
      'date_limit'=>'required',
      'description'=>'required',
      'money'=>'required',
        ]);

        $discuss=Order::create([
      'profile_id'=>$id,
      'date_limit'=>request()->date_limit,
      'description'=>request()->description,
      'money'=>request()->money,
      'user_id'=>$usid
    ]);
    session()->flash('success','Order Posted successfully');

    return redirect('/forum');
  }

      public function order_list()
      {
        $usid=Auth::user()->id;
        $showdata=DB::table("users")
        ->join('orders','orders.user_id','users.id')
        ->select('orders.*')
        ->where('orders.user_id',$usid)

        ->get();
          return view('users.index',compact('showdata'));
         //return view ('users.index', array('user'=>Auth::user()));
      }




 }
