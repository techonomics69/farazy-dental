<?php

namespace App\Http\Controllers\Backend\Party;

use App\Repository\PartyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class PartyController extends Controller
{
    private $party;

    public function __construct(PartyRepository $partyRepository)
    {
        $this->party = $partyRepository;
    }

    public function index(){
        $parties = $this->party->orderBy('name','ASC')->all();
        return view('admin.item.parties')->with([
            'parties'       => $parties,
        ]);
    }

    public function store(Request $request){
        //return $request->all();
        $this->party->create($request->all());
        return redirect()->back();
    }

    public function getParty($id){
        $party = $this->party->getById($id);
        return response()->json($party,200);
    }

    public function update(Request $request,$id){
        $this->party->updateById($id,$request->all());
        return redirect()->back();
    }

    public function delete($id){
        $this->party->deleteById($id);
        return redirect()->back();
    }
}
