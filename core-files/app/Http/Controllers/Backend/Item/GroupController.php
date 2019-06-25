<?php

namespace App\Http\Controllers\Backend\Item;

use App\Repository\GroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    private $group;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->group = $groupRepository;
    }

    public function getGroups(){
        $groups['items'] = $this->group->all();
        return response()->json($groups,200);
    }

    public function index(){
        $groups = $this->group->orderBy('item_group_name','ASC')->all();
        return view('admin.item.groups')->with([
            'groups'    => $groups
        ]);
    }

    public function store(Request $request){
        $this->group->create($request->only(['item_group_name','parent_id']));
        return redirect()->back();
    }

    public function getGroup($id){
        $group = $this->group->getById($id);
        return response()->json($group,200);
    }

    public function update(Request $request,$id){
        $this->group->updateById($id,$request->only(['item_group_name','parent_id']));
        return redirect()->back();
    }

    public function delete($id){
        $this->group->deleteById($id);
        return redirect()->back();
    }
}
