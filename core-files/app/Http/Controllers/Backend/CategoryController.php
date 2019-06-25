<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index')->with([
            'categories'    => $categories
        ]);
    }

    public function store(Request $request){
        $category = Category::create($request->only('name'));
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created'
        ]);
    }

    public function edit($id){
        $category = Category::find($id);
        return response()->json($category,200);
    }

    public function update(Request $request,$id){
        Category::findOrFail($id)->update($request->only('name'));
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated'
        ]);
    }

    public function delete($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully deleted'
        ]);
    }


}
