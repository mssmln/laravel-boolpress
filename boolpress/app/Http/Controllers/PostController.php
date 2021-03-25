<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){

        $posts_data = Post::all();
        //dd($posts_data); it worked 

        $data = [
            'posts' => $posts_data
        ];

        return view('guest.post.index',$data);
    }

    public function show($segnaposto){
        $posts_data = Post::where('slug',$segnaposto)->first();
        $data = [
            'posts' => $posts_data
        ];

        return view('guest.post.show',$data);
    }
}
