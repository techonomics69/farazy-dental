<?php

namespace App\Http\Controllers\Backend\Item;

use App\Repository\ThClassRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemThController extends Controller
{
    private $item_th_class;

    public function __construct(ThClassRepository $thClassRepository)
    {
        $this->item_th_class = $thClassRepository;
    }

    public function index(){
        $item_th_classes = $this->item_th_class->orderBy('th_class_name','ASC')->all();
        return view('admin.item.th-classes')->with([
            'item_th_classes'    => $item_th_classes
        ]);
    }

    public function store(Request $request){
        $this->item_th_class->create($request->only(['th_class_name','parent_id']));
        return redirect()->back();
    }

    public function getThClass($id){
        $item_th_class = $this->item_th_class->getById($id);
        return response()->json($item_th_class,200);
    }

    public function update(Request $request,$id){
        $this->item_th_class->updateById($id,$request->only(['th_class_name','parent_id']));
        return redirect()->back();
    }

    public function delete($id){
        $this->item_th_class->deleteById($id);
        return redirect()->back();
    }
}
