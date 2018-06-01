<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostResource;
class ClientPostController extends Controller
{
    public function index(){
        $posts=Post::orderBy('postId','desc')->paginate(3);

        return PostResource::collection($posts);
    }

    public function search(Request $r){



        $posts=Post::orderBy('postId','desc')
            ->where('title','like',"%".$r->search."%")
            ->orWhere('details','like','%'.$r->search.'%')
            ->paginate(3);

        return PostResource::collection($posts);

        }

    public function contact(Request $r){

        return $r;
    }
}
