<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class DentalTipsController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->get();
        $categories = Category::all();
        return view('admin.dental-tips.index')->with([
            'posts' => $posts,
            'categories'    => $categories
        ]);
    }

    public function store(Request $request){
        $post = Post::create($request->all());
        if($request->file('image')){
            $name = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('images/dental-tips',$name);
            $name = 'images/dental-tips/'.$name;
            $post->update([
                'image'  => $name
            ]);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created this dental tips.'
        ]);
    }

    public function edit($id){
        $dental_tip = Post::find($id);
        $categories = Category::all();
        return view('admin.dental-tips.edit')->with([
            'dental_tip'    => $dental_tip,
            'categories'    => $categories
        ]);
    }

    public function update(Request $request,$id){
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $path = public_path().'/'.$post->image;
        if($request->file('image')){
            $name = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('images/dental-tips',$name);
            $name = 'images/dental-tips/'.$name;
            $post->update([
                'image'  => $name
            ]);
            File::delete($path);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated this dental tips.'
        ]);
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $path = public_path().'/'.$post->image;
        $post->delete();
        File::delete($path);
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated this dental tips.'
        ]);
    }
}
