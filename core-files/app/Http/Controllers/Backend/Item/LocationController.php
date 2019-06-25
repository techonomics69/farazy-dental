<?php

namespace App\Http\Controllers\Item;

use App\Repository\LocationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    private $location;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->location = $locationRepository;
    }

    public function index(){
        $locations = $this->location->orderBy('name','ASC')->all();
        return view('item.locations')->with([
            'locations'    => $locations
        ]);
    }

    public function store(Request $request){
        $this->location->create($request->only('name'));
        return redirect()->back();
    }

    public function getlocation($id){
        $location = $this->location->getById($id);
        return response()->json($location,200);
    }

    public function update(Request $request,$id){
        $this->location->updateById($id,$request->only('name'));
        return redirect()->back();
    }

    public function delete($id){
        $this->location->deleteById($id);
        return redirect()->back();
    }
}
