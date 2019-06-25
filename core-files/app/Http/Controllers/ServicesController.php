<?php

namespace App\Http\Controllers;

use App\Model\Department;
use App\Model\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $services = Services::orderBy('id','asc')->get();
        $departments = Department::orderBy('id','asc')->get();
        return view('frontend.services')->with([
            'services'      => $services,
            'departments'   => $departments
        ]);
    }
    
    public function details($id){
        $services = Services::orderBy('id','desc')->take(10)->get();
        $service_detail = Services::findOrFail($id);
        return view('frontend.service-details')->with([
            'services' => $services,
            'service_detail'   => $service_detail
        ]);
    }
    public function departmentDetails ($id){
        $departments = Department::orderBy('id','desc')->take(10)->get();
        $department_detail = Department::findOrFail($id);
        return view('frontend.department-details')->with([
            'departments' => $departments,
            'department_detail'   => $department_detail
        ]);
    }
}
