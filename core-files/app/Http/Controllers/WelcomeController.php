<?php

namespace App\Http\Controllers;

use App\Model\BoardOfDirector;
use App\Model\CorporatePartner;
use App\Model\Doctor;
use App\Model\Services;
use App\Model\Slider;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('slide_order','asc')->get();
        $directors = BoardOfDirector::orderBy('sl_no','asc')->where('in_home',true)->take(3)->get();
        $services = Services::orderBy('id','asc')->get();
        $doctors = Doctor::orderBy('id','asc')->get();
        $corporate_partners = CorporatePartner::orderBy('slide_order','asc')->get();
        return view('welcome')->with([
            'sliders'   => $sliders,
            'directors' => $directors,
            'services'  => $services,
            'doctors'   => $doctors,
            'corporate_partners'   => $corporate_partners
        ]);
    }
}
