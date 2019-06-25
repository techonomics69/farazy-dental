<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class DentalTipsController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(12);

        return view('frontend.dental-tips')->with([
            'posts' => $posts
        ]);
    }

    public function details($id){
        $posts = Post::orderBy('id','desc')->take(10)->get();
        $post_detail = Post::findOrFail($id);
        return view('frontend.blog-details')->with([
            'posts' => $posts,
            'post_detail'   => $post_detail
        ]);
    }
}
