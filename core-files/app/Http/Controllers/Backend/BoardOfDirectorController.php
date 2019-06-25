<?php

namespace App\Http\Controllers\Backend;

use App\Model\BoardOfDirector;
use App\Model\Department;
use App\Model\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class BoardOfDirectorController extends Controller
{
    public function index(){
        $directors = BoardOfDirector::orderBy('id','desc')->get();
        $designations = Designation::all();
        return view('admin.directors.index')->with([
            'directors'  => $directors,
            'designations'  => $designations
        ]);
    }

    public function store(Request $request){
        $director = BoardOfDirector::create($request->all());
        if($request->file('image')){
            $name = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('images/director-image',$name);
            $name = 'images/director-image/'.$name;
            $director->update([
                'image'  => $name
            ]);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created this corporate partner.'
        ]);
    }

    public function edit($id){
        $director = BoardOfDirector::findOrFail($id);
        $designations  = Designation::all();
        $departments = Department::all();
        //return response()->json($director,200);
        return view('admin.directors.edit')->with([
            'doctor'  => $director,
            'designations'  => $designations,
            'departments'   => $departments
        ]);
    }

    public function update(Request $request,$id){
        $director = BoardOfDirector::findOrFail($id);
        $director->update($request->all());
        $path = public_path().'/'.$director->image;
        if($request->file('image')){
            $name = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('images/director-image',$name);
            $name = 'images/director-image/'.$name;
            $director->update([
                'image'  => $name
            ]);
            File::delete($path);
        }

        if(!$request->input('in_home')){
            $director->update([
                'in_home'  => false
            ]);
        }
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated this corporate partner.'
        ]);
    }

    public function delete($id){
        $director = BoardOfDirector::findOrFail($id);
        $path = public_path().'/'.$director->image;
        BoardOfDirector::findOrFail($id)->delete();
        File::delete($path);
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully deleted this slider item.'
        ]);
    }
}
