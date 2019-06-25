<?php

namespace App\Http\Controllers\Backend;

use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index')->with([
            'sliders'   => $sliders
        ]);
    }

    public function store(Request $request){
        $slider = Slider::create($request->all());
        if($request->file('slider_image')){
            $name = time().".".$request->file('slider_image')->getClientOriginalExtension();
            $request->file('slider_image')->move('images/slider-image',$name);
            $name = 'images/slider-image/'.$name;
            $slider->update([
                'slider_image'  => $name
            ]);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created this slider item.'
        ]);
    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        return response()->json($slider,200);
    }

    public function update(Request $request,$id){
        $slider = Slider::findOrFail($id);
        $slider->update($request->all());
        $path = public_path().'/'.$slider->slider_image;
        if($request->file('slider_image')){
            $name = time().".".$request->file('slider_image')->getClientOriginalExtension();
            $request->file('slider_image')->move('images/slider-image',$name);
            $name = 'images/slider-image/'.$name;
            $slider->update([
                'slider_image'  => $name
            ]);
            File::delete($path);
        }
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated this slider item.'
        ]);
    }

    public function delete($id){
        $slider = Slider::findOrFail($id);
        $path = public_path().'/'.$slider->slider_image;
        $slider->delete();
        File::delete($path);
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully deleted this slider item.'
        ]);
    }
}
