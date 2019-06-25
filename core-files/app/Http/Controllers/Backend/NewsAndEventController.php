<?php

namespace App\Http\Controllers\Backend;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class NewsAndEventController extends Controller
{
    public function index(){
        $posts = Event::orderBy('id','desc')->get();
        return view('admin.events.index')->with([
            'events' => $posts,
        ]);
    }

    public function store(Request $request){
        $post = Event::create($request->all());
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
        $dental_tip = Event::find($id);
        return view('admin.dental-tips.edit')->with([
            'dental_tip'    => $dental_tip,
        ]);
    }

    public function update(Request $request,$id){
        $post = Event::findOrFail($id);
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
        $post = Event::findOrFail($id);
        $path = public_path().'/'.$post->image;
        $post->delete();
        File::delete($path);
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated this dental tips.'
        ]);
    }
}
