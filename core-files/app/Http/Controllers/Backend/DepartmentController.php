<?php

namespace App\Http\Controllers\Backend;

use App\Model\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::orderBy('id','desc')->get();
        return view('admin.departments.index')->with([
            'departments'   => $departments
        ]);
    }

    public function store(Request $request){
        $department = Department::create($request->only('title','icon','description'));

        if($request->file('featured_image')){
            $name = time().".".$request->file('featured_image')->getClientOriginalExtension();
            $request->file('featured_image')->move('images/featured-image',$name);
            $name = 'images/featured-image/'.$name;
            $department->update([
                'featured_image'  => $name
            ]);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created department'
        ]);
    }

    public function edit($id){
        $departments = Department::findOrFail($id);
        return response()->json($departments,200);
    }

    public function update(Request $request,$id){
        $department = Department::findOrFail($id);
        $path = public_path().'/'.$department->featured_image;
        $department->update($request->only('title','icon','description'));

        if($request->file('featured_image')){
            $name = time().".".$request->file('featured_image')->getClientOriginalExtension();
            $request->file('featured_image')->move('images/featured-image',$name);
            $name = 'images/featured-image/'.$name;
            $department->update([
                'featured_image'  => $name
            ]);
            File::delete($path);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated department'
        ]);
    }

    public function delete($id){
        $department = Department::findOrFail($id);
        $path = public_path().'/'.$department->featured_image;
        $department->delete();
        File::delete($path);
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully deleted department'
        ]);
    }
}
