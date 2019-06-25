<?php

namespace App\Http\Controllers;

use App\Model\Department;
use App\Model\Doctor;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index(){
        $departments = Department::orderBy('title','asc')->get();
        $doctors = Doctor::with(['department','designation'])->orderBy('name','asc')->get();
        return view('frontend.specialist')->with([
            'departments'   => $departments,
            'doctors'       => $doctors
        ]);
    }
}
