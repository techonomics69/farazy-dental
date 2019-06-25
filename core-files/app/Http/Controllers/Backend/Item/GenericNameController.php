<?php

namespace App\Http\Controllers\Backend\Item;

use App\Repository\GenericNameRepository;
use App\Repository\ThClassRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenericNameController extends Controller
{
    private $generic_name;
    private $item_th_class;

    public function __construct(GenericNameRepository $genericNameRepository, ThClassRepository $thClassRepository)
    {
        $this->generic_name = $genericNameRepository;
        $this->item_th_class = $thClassRepository;
    }

    public function index(){
        $item_th_classes = $this->item_th_class->all();
        $generic_names = $this->generic_name->orderBy('item_generic_name','ASC')->all();
        return view('admin.item.generic_names')->with([
            'generic_names'    => $generic_names,
            'item_th_classes'    => $item_th_classes,
        ]);
    }

    public function store(Request $request){
        $this->generic_name->create($request->only('item_generic_name','th_class_id'));
        return redirect()->back();
    }

    public function getGenericName($id){
        $generic_name = $this->generic_name->getById($id);
        return response()->json($generic_name,200);
    }

    public function update(Request $request,$id){
        $this->generic_name->updateById($id,$request->only('item_generic_name','th_class_id'));
        return redirect()->back();
    }

    public function delete($id){
        $this->generic_name->deleteById($id);
        return redirect()->back();
    }
}
