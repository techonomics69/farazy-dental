<?php

namespace App\Http\Controllers\Backend;

use App\Model\Appointment;
use App\Model\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AppointmentController extends Controller
{
    public function index(){
        $date = Carbon::now()->format('Y-m-d');
        $appointments = Appointment::with(['doctor'])->where('appointment_date','>=',$date)->orderBy('id','desc')->get();
        $doctors = Doctor::all();
        return view('admin.appointments.index')->with([
            'appointments'  => $appointments,
            'doctors'       => $doctors
        ]);
    }

    public function doctorAppointments($id){
        $appointments = Appointment::where('doctor_id',$id)->orderBy('id','desc')->get();
        return view('doctor.appointments.index')->with([
            'appointments'  => $appointments
        ]);
    }

}
