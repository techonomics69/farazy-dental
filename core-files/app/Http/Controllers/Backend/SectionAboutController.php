<?php

namespace App\Http\Controllers\Backend;

use App\SectionAbout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class SectionAboutController extends Controller
{
    public function index(){
        $about = SectionAbout::first();
        return view('admin.about.index')->with([
            'about' => $about
        ]);
    }

    public function store(Request $request){
        $about = SectionAbout::first();

        if($about){
            $path = public_path().'/'.$about->image;
            $about->update($request->only('title','description'));
            if($request->file('image')){
                $name = time().".".$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move('images/about-image',$name);
                $name = 'images/about-image/'.$name;
                $about->update([
                    'image'  => $name
                ]);
                File::delete($path);
            }
        }else{
            $about = SectionAbout::create($request->only('title','description'));
            if($request->file('image')){
                $name = time().".".$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move('images/about-image',$name);
                $name = 'images/about-image/'.$name;
                $about->update([
                    'image'  => $name
                ]);

            }
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created/updated this information'
        ]);
    }
}
