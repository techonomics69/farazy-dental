<?php

namespace App\Http\Controllers\Backend;

use App\Model\BasicSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasicSettingsController extends Controller
{
    public function index(){
        return view('admin.basic-settings.index');
    }

    public function update(Request $request){
        //return $request->all();
        $settings = BasicSetting::first();
        if($settings){
            $settings->update($request->only([
                'app_name','phone','email','mobile','description','address','facebook','twitter','google_plus','skype','youtube'
            ]));
        }
        else{
            $settings = BasicSetting::create($request->only([
                'app_name','phone','email','mobile','description','address','facebook','twitter','google_plus','skype','youtube'
            ]));
        }

        if($request->file('logo')){
            $name = time().".".$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move('images',$name);
            $name = 'images/'.$name;
            $settings->update([
                'logo'  => $name
            ]);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert-succes',
            'text'      => 'Successfully updated basic settings.'
        ]);
    }
}
