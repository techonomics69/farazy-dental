<?php

namespace App\Http\Controllers\Backend\Item;

use App\Repository\ItemTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemTypeController extends Controller
{
    private $item_type;

    public function __construct(ItemTypeRepository $itemTypeRepository)
    {
        $this->item_type = $itemTypeRepository;
    }

    public function index(){
        $item_types = $this->item_type->orderBy('item_type_name','ASC')->all();
        return view('admin.item.item-types')->with([
            'item_types'    => $item_types
        ]);
    }

    public function store(Request $request){
        $this->item_type->create($request->only('item_type_name'));
        return redirect()->back();
    }

    public function getItemType($id){
        $item_type = $this->item_type->getById($id);
        return response()->json($item_type,200);
    }

    public function update(Request $request,$id){
        $this->item_type->updateById($id,$request->only('item_type_name'));
        return redirect()->back();
    }

    public function delete($id){
        $this->item_type->deleteById($id);
        return redirect()->back();
    }
}
