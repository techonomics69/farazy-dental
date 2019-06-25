<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->doctor){
            return view('doctor.dashboard.index')->with([
                'doctor'    => Auth::user()->doctor
            ]);
        }
        return view('admin.dashboard.index');
    }
}
