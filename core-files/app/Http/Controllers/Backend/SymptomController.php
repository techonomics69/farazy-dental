<?php

namespace App\Http\Controllers\Backend;

use App\Model\Symptom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SymptomController extends Controller
{
    public function index(){
        $symptoms = Symptom::orderBy('id','desc')->get();
        return view('admin.symptom.index')->with([
            'symptoms' => $symptoms
        ]);
    }

    public function getSymptom($id){
        $symptom = Symptom::findOrFail($id);
        return response()->json($symptom,200);
    }

    public function store(Request $request){
        Symptom::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request,$id){
        $symptom = Symptom::findOrFail($id);
        $symptom->update($request->all());
        return redirect()->back();
    }
    public function delete($id){
        Symptom::findOrFail($id)->delete();
        return redirect()->back();
    }
}
