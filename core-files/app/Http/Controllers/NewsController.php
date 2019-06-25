<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $newses = Event::orderBy('id','desc')->paginate(10);
        return view('frontend.news')->with([
            'newses'    => $newses
        ]);
    }

    public function details($id){
        $posts = Event::orderBy('id','desc')->take(10)->get();
        $post_detail = Event::findOrFail($id);
        return view('frontend.event-details')->with([
            'posts' => $posts,
            'post_detail'   => $post_detail
        ]);
    }
}
