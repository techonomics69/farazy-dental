<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Repository\ManufacturerRepository;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    private $manufacturer;

    public function __construct(ManufacturerRepository $manufacturerRepository)
    {
        $this->manufacturer = $manufacturerRepository;
    }

    public function index(){
        $manufacturers = $this->manufacturer->orderBy('name','ASC')->all();
        return view('item.manufacturers')->with([
            'manufacturers'    => $manufacturers
        ]);
    }

    public function store(Request $request){
        $this->manufacturer->create($request->only('name'));
        return redirect()->back();
    }

    public function getManufacturer($id){
        $manufacturer = $this->manufacturer->getById($id);
        return response()->json($manufacturer,200);
    }

    public function update(Request $request,$id){
        $this->manufacturer->updateById($id,$request->only('name'));
        return redirect()->back();
    }

    public function delete($id){
        $this->manufacturer->deleteById($id);
        return redirect()->back();
    }
}
