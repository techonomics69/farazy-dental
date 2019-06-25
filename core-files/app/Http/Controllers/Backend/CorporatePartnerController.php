<?php

namespace App\Http\Controllers\Backend;

use App\Model\CorporatePartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class CorporatePartnerController extends Controller
{
    public function index(){
        $partners = CorporatePartner::orderBy('id','desc')->get();
        return view('admin.partners.index')->with([
            'partners'  => $partners
        ]);
    }

    public function store(Request $request){
        $partner = CorporatePartner::create($request->all());
        if($request->file('partner_image')){
            $name = time().".".$request->file('partner_image')->getClientOriginalExtension();
            $request->file('partner_image')->move('images/partner-image',$name);
            $name = 'images/partner-image/'.$name;
            $partner->update([
                'partner_image'  => $name
            ]);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created this corporate partner.'
        ]);
    }

    public function edit($id){
        $partner = CorporatePartner::findOrFail($id);
        return response()->json($partner,200);
    }

    public function update(Request $request,$id){
        $partner = CorporatePartner::findOrFail($id);
        $partner->update($request->all());
        $path = public_path().'/'.$partner->partner_image;
        if($request->file('partner_image')){
            $name = time().".".$request->file('partner_image')->getClientOriginalExtension();
            $request->file('partner_image')->move('images/partner-image',$name);
            $name = 'images/partner-image/'.$name;
            $partner->update([
                'partner_image'  => $name
            ]);
            File::delete($path);
        }
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated this corporate partner.'
        ]);
    }

    public function delete($id){
        $partner = CorporatePartner::findOrFail($id);
        $path = public_path().'/'.$partner->partner_image;
        $partner->delete();
        File::delete($path);
        return redirect()->back()->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully deleted this slider item.'
        ]);
    }
}
