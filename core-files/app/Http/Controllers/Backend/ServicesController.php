<?php

namespace App\Http\Controllers\Backend;

use App\Model\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class ServicesController extends Controller
{
    public function index(){
        $services = Services::orderBy('id','desc')->get();
        return view('admin.services.index')->with([
            'services'   => $services
        ]);
    }

    public function store(Request $request){
        $service = Services::create($request->only('title','icon','description'));

        if($request->file('featured_image')){
            $name = time().".".$request->file('featured_image')->getClientOriginalExtension();
            $request->file('featured_image')->move('images/services-featured-image',$name);
            $name = 'images/services-featured-image/'.$name;
            $service->update([
                'featured_image'  => $name
            ]);
        }
        if($request->file('icon_image')){
            $name = time().".".$request->file('icon_image')->getClientOriginalExtension();
            $request->file('icon_image')->move('images/services-icon-image',$name);
            $name = 'images/services-icon-image/'.$name;
            $service->update([
                'icon_image'  => $name
            ]);
        
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created service'
        ]);
    }

    public function edit($id){
        $service = Services::findOrFail($id);
        return response()->json($service,200);
    }

    public function update(Request $request,$id){
        $service = Services::findOrFail($id);
        $path = public_path().'/'.$service->featured_image;
        $service->update($request->only('title','icon','description'));

        if($request->file('featured_image')){
            $name = time().".".$request->file('featured_image')->getClientOriginalExtension();
            $request->file('featured_image')->move('images/services-featured-image',$name);
            $name = 'images/services-featured-image/'.$name;
            $service->update([
                'featured_image'  => $name
            ]);
            File::delete($path);
        }
        $path = public_path().'/'.$service->icon_image;
        
        if($request->file('icon_image')){
            $name = time().".".$request->file('icon_image')->getClientOriginalExtension();
            $request->file('icon_image')->move('images/services-icon-image',$name);
            $name = 'images/services-icon-image/'.$name;
            $service->update([
                'icon_image'  => $name
            ]);
            File::delete($path);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated service'
        ]);
    }

    public function delete($id){
        $service = Services::findOrFail($id);
        $path = public_path().'/'.$service->featured_image;
        $service->delete();
        File::delete($path);
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully deleted department'
        ]);
    }
}
