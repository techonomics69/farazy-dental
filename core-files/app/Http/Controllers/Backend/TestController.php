<?php

namespace App\Http\Controllers\Backend;

use App\Model\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){
        $tests = Test::orderBy('id','desc')->get();
        return view('admin.test.index')->with([
            'tests' => $tests
        ]);
    }

    public function getTest($id){
        $test = Test::findOrFail($id);
        return response()->json($test,200);
    }

    public function store(Request $request){
        Test::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request,$id){
        $test = Test::findOrFail($id);
        $test->update($request->all());
        return redirect()->back();
    }
    public function delete($id){
        Test::findOrFail($id)->delete();
        return redirect()->back();
    }
}
