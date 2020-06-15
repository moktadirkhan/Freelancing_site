<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;


class ForumController extends Controller
{
  public function index()
  {
    $discussions=Post::orderBy('created_at','desc')->paginate(3);
      return view('forum',['discussions'=>$discussions]);
  }

}
