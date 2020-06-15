<?php

namespace App\Http\Controllers;
use Auth;
use Str;
use App\Post;
use App\User;
use App\Replies;
use Illuminate\Http\Request;
//use App\Http\Requests\Post\PostControllerRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
   {
     return view("posts.index")->with('posts',Post::all());
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
     return view("posts.create");
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
     $usid=Auth::user()->id;
     $this->validate(request(),[
     'title'=>'required|unique:posts',
     'content'=>'required',

     ]);

     $discuss=Post::create([
       'title'=>$request->title,
       'content'=>$request->content,
       'user_id'=>$usid,
       'slug'=>Str::slug($request->title)
     ]);
     session()->flash('success','Post created successfully');

     return redirect()->route('discussion',['slug'=>$discuss->slug]);
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($slug)
   {
      $discussion=Post::where('slug',$slug)->first();

      return view('posts.show')->with('discussion',$discussion);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(Post $post)
   {
       return view('posts.create')->with('post',$post);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Post $post)
   {
       $this->validate(request(),[
     'title'=>'required|unique:posts',
     'description'=>'required',
     'content'=>'required'
   ]);
     //$data=$request->only(['title','description','published_at','content']);
     /*   if ($request->hasFile('image')){
          //check if new image
          $image=$request->image->store('posts');
          //upload it
         Storage::delete($post->image);
         //delete old one

         $data['image']=$image;
        }
        $post->update($data);*/
        Post::update([
          'title'=>$request->title,
          'description'=>$request->description,
          'content'=>$request->content,
          'image'=>$image
        ]);
        $post->deleteImage();

        session()->flash('success','Post updated successfully');

        return redirect('posts.index');
   }

    public function destroy($id)
    {
        //
    }

    public function reply($id)
    {
      $d=Post::find($id);
      $this->validate(request(),[

      'content'=>'required',
      'amounts'=>'required',

      ]);

      $reply=Replies::create([
        'user_id'=>Auth::id(),
        'post_id'=>$id,
        'content'=>request()->content,
        'amounts'=>request()->amounts

      ]);
      session()->flash('success','Replied to Post');

      return redirect()->back();
    }


}
