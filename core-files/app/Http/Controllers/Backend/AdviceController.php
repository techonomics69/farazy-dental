<?php

namespace App\Http\Controllers\Backend;

use App\Model\Advice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdviceController extends Controller
{
    public function index(){
        $advices = Advice::orderBy('id','desc')->get();
        return view('admin.advice.index')->with([
            'advices' => $advices
        ]);
    }

    public function getAdvice($id){
        $advice = Advice::findOrFail($id);
        return response()->json($advice,200);
    }

    public function store(Request $request){
        Advice::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request,$id){
        $advice = Advice::findOrFail($id);
        $advice->update($request->all());
        return redirect()->back();
    }
    public function delete($id){
        Advice::findOrFail($id)->delete();
        return redirect()->back();
    }
}
