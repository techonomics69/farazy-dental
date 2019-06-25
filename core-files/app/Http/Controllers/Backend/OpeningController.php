<?php

namespace App\Http\Controllers\Backend;

use App\Model\DoctorOpening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpeningController extends Controller
{
    public function store(Request $request){
        $days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        $opening = DoctorOpening::create($request->only('opening_day_id','start_time','end_time','doctor_id','max_appointment'));
        $opening->fill([
            'opening_day'   => $days[$request->opening_day_id]
        ])->save();
        return redirect()->back()->withMessage([
            'status'    => 'alert-danger',
            'text'      => 'Successfully created'
        ]);
    }

    public function edit($id){
        $opening = DoctorOpening::findOrFail($id);
        return response()->json($opening,200);
    }

    public function update(Request $request,$id){
        $days = ["Sunday","Monday","Tuesday","Wednesday","Thurstday","Friday","Saturday"];
        $opening = DoctorOpening::findOrFail($id);
        $opening->update($request->only('opening_day_id','start_time','end_time','max_appointment'));
        $opening->fill([
            'opening_day'   => $days[$request->opening_day_id]
        ])->save();
        return redirect()->back()->withMessage([
            'status'    => 'alert-danger',
            'text'      => 'Successfully updated'
        ]);
    }

    public function delete($id){
        DoctorOpening::findOrFail($id)->delete();
        return redirect()->back()->withMessage([
            'status'    => 'alert-danger',
            'text'      => 'Successfully deleted'
        ]);
    }
}
