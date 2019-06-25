<?php

namespace App\Http\Controllers\Backend;

use App\Model\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    public function index(){
        $designations = Designation::orderBy('id','desc')->get();
        return view('admin.designations.index')->with([
            'designations'  => $designations
        ]);
    }

    public function store(Request $request){
        Designation::firstOrCreate($request->only('title'));
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created designations'
        ]);
    }

    public function edit($id){
        $designation = Designation::findOrFail($id);
        return response()->json($designation,200);
    }

    public function update(Request $request,$id){
        Designation::findOrFail($id)->update($request->only('title'));
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated designations'
        ]);
    }

    public function delete($id){
        Designation::findOrFail($id)->delete();
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully deleted designations'
        ]);
    }


}
