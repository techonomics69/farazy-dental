<?php

namespace App\Http\Controllers\Backend;

use App\Model\Department;
use App\Model\Designation;
use App\Model\Doctor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class DoctorsController extends Controller
{
    public function index(){
        $doctors = Doctor::orderBy('id','desc')->get();
        return view('admin.doctors.index')->with([
            'doctors'   => $doctors,
        ]);
    }

    public function show($id){
        $doctor = $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.show')->with([
            'doctor'    => $doctor
        ]);
    }

    public function create(){
        $designations = Designation::orderBy('title','asc')->get();
        $departments  = Department::orderBy('title','asc')->get();
        return view('admin.doctors.create')->with([
            'departments'   => $departments,
            'designations'  => $designations
        ]);
    }

    public function edit($id){
        $doctor = Doctor::findOrFail($id);
        $designations = Designation::orderBy('title','asc')->get();
        $departments  = Department::orderBy('title','asc')->get();
        return view('admin.doctors.edit')->with([
            'departments'   => $departments,
            'designations'  => $designations,
            'doctor'    => $doctor
        ]);
    }

    public function store(Request $request){
        $doctor = Doctor::create($request->only('name','designation_id','department_id','specialization','max_appointment','email','contact_no','phone','appoint_time'));
        if($request->file('photo')){
            $name = time().".".$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move('images/doctors',$name);
            $name = 'images/doctors/'.$name;
            $doctor->update([
                'photo'  => $name
            ]);
        }

        User::create([
            'name'  => $doctor->name,
            'email' => $doctor->email,
            'password'  => $request->input('password'),
            'user_tpe'  => '2',
            'type_ref'  => $doctor->id
        ]);

        return redirect()->route('doctors')->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully created doctor'
        ]);
    }

    public function update(Request $request,$id){
        $doctor = Doctor::findOrFail($id);
        $path = public_path().'/'.$doctor->photo;
        $doctor->update($request->only('name','designation_id','department_id','specialization','max_appointment','email','contact_no','phone','appoint_time'));
        if($request->file('photo')){
            $name = time().".".$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move('images/doctors',$name);
            $name = 'images/doctors/'.$name;
            $doctor->update([
                'photo'  => $name
            ]);
            File::delete($path);
        }

        $user = User::where('email',$doctor->email)->first();
        if(!$user && $request->input('password')){
            $user = User::create([
                'name'  => $doctor->name,
                'email' => $doctor->email,
                'user_type'  => '2',
                'type_ref'  => $doctor->id,
                'password'  => bcrypt($request->input('password')),
            ]);
        }else{
            $user->update([
                'name'  => $doctor->name,
                'email' => $doctor->email,
            ]);
            if($request->input('password')){
                $user->update([
                    'password'  => bcrypt($request->input('password')),
                ]);
            }
        }

        return redirect()->route('doctors')->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully updated doctor'
        ]);
    }

    public function delete($id){
        $doctor = Doctor::findOrFail($id);
        $path = public_path().'/'.$doctor->photo;
        $doctor->delete();
        File::delete($path);
        return redirect()->route('doctors')->withMessage([
            'status'    => 'alert-success',
            'text'      => 'Successfully deleted doctor'
        ]);
    }

    public function createAccount(Request $request,$id){
        $doctor = Doctor::findOrFail($id);
        if($doctor->email && !User::where('email',$doctor->email)->first()){
            $user = User::create([
                'email' => $doctor->email,
                'password'  => bcrypt($request->input('password')),
                'name'  => $doctor->name,
                'type_ref'  => $doctor->id,
                'user_type' => 2
            ]);
        }
        return redirect()->back();
    }
}
