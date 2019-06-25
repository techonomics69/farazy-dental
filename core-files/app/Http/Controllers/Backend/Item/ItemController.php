<?php

namespace App\Http\Controllers\Backend\Item;

use App\Model\Item\Item;
use App\Repository\GenericNameRepository;
use App\Repository\GroupRepository;
use App\Repository\ItemRepository;
use App\Repository\ItemTypeRepository;
use App\Repository\PartyRepository;
use App\Repository\UnitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    private $item;
    private $item_generic;
    private $group;
    private $party;
    private $item_type;

    public function __construct(
        ItemRepository $itemRepository,
        GenericNameRepository $genericNameRepository,
        GroupRepository $groupRepository,
        PartyRepository $partyRepository,
        ItemTypeRepository $itemTypeRepository
    )
    {
        $this->item = $itemRepository;
        $this->item_generic = $genericNameRepository;
        $this->group = $groupRepository;
        $this->party = $partyRepository;
        $this->item_type = $itemTypeRepository;
    }

    public function index(){
        $items = $this->item->orderBy('item_name','ASC')->all();
        $item_generics = $this->item_generic->orderBy('item_generic_name','ASC')->all();
        $groups = $this->group->orderBy('item_group_name','ASC')->all();
        $parties = $this->party->orderBy('party_name','ASC')->all();
        $item_types = $this->item_type->orderBy('item_type_name','ASC')->all();
        return view('admin.item.items')->with([
            'items'             => $items,
            'item_generics'     => $item_generics,
            'groups'            => $groups,
            'parties'           => $parties,
            'item_types'        => $item_types,
        ]);
    }

    public function store(Request $request){
        $this->item->create($request->all());
        return redirect()->back();
    }

    public function getItem($id){
        $item = $this->item->getById($id);
        return response()->json($item,200);
    }

    public function getItems($q = null){
        if(!$q){
            $items['items'] = $this->item->all();
            return response()->json($items,200);
        }
        $items['items'] = Item::where( 'item_name','like', '%' . $q . '%')->get();
        return response()->json($items,200);

    }

    public function update(Request $request,$id){
        $this->item->updateById($id,$request->all());
        return redirect()->back();
    }

    public function delete($id){
        $this->item->deleteById($id);
        return redirect()->back();
    }
}
