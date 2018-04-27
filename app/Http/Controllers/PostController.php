<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }





    public function add(){


        return view('post.add');
    }

    public function insert(Request $r){
        $post=new Post();
        $post->title=$r->title;
        $post->details=$r->details;
        $post->userId=Auth::user()->userId;
        $post->save();

        return back();
    }



}
