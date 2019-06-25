<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use App\Model\Services;
use App\SectionAbout;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $services = Services::orderBy('id','asc')->get();
        $doctors = Doctor::orderBy('id','asc')->get();
        $about = SectionAbout::first();
        return view('frontend.about')->with([
            'services'  => $services,
            'doctors'   => $doctors,
            'about'     => $about
        ]);
    }
}
