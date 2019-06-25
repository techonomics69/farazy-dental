<?php

namespace App\Http\Controllers;

use App\Model\Appointment;
use App\Model\Doctor;
use App\Model\DoctorOpening;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class AppointmentController extends Controller
{
    public function index($id){
        $doctor = Doctor::findOrFail($id);
        $dates = $doctor->openings->pluck('opening_day_id');
        return view('frontend.get-appointment')->with([
            'doctor'   => $doctor,
            'dates'     => $dates
        ]);
    }

    public function store(Request $request,$id){
        //return $request->all();
        $day = Carbon::parse($request->appointment_date)->format("N") - 1;
        $opening = DoctorOpening::where('doctor_id',$request->doctor_id)->first();
    
        $doctor = Doctor::findOrFail($request->doctor_id);
        if($doctor->appoint_time){
            $appointment_time = $doctor->appoint_time * ($request->sl_no - 1);
            if($opening)
                $reporting_time = Carbon::parse($opening->start_time)->addMinutes($appointment_time)->format('g:i A');
            else
                $reporting_time = " N\A";
        }
        
        else{
            $reporting_time = false;
        }
        
        
        $appointment = Appointment::create($request->all());
        $contact_no = '880'.substr($request->input('contact_no'), - 10);
        $message = "Appointment confirmed with .".$appointment->doctor->name.". Date ". Carbon::parse($appointment->appointment_date)->format('d F y') .",". " Sl No: ". $appointment->sl_no." at ".$reporting_time. ". Doctor avaiable from " .$opening->start_time. " to ". $opening->end_time.". Helpline: 01934999555. Farazy Dental Hospital & Research Center";
    
        $this->sendSms($message,$contact_no);
        return redirect()->back();
    }
    
    public function apiStore(Request $request,$id){
        //return request()->all();
        try{
            $day = Carbon::parse($request->appointment_date)->format("N");
            $opening = DoctorOpening::where('opening_day_id',$day)->where('doctor_id',$id)->first();
            $doctor = Doctor::findOrFail($id);
            if($doctor->appoint_time){
                $appointment_time = $doctor->appoint_time * $request->sl_no;
                $reporting_time = Carbon::parse($opening->start_time)->addMinutes($appointment_time)->format('g:i A');
            }
    
            else{
                $reporting_time = false;
            }
            $appointment = Appointment::create($request->all());
            $contact_no = '880'.substr($request->input('contact_no'), - 10);
            $message = "Appointment confirmed with .".$appointment->doctor->name.". Date ". Carbon::parse($appointment->appointment_date)->format('d F y') .",". Carbon::parse($appointment->appointment_date)->format('l') .  " at ".$reporting_time." Sl No: ". $appointment->sl_no;
            $this->sendSms($message,$contact_no);
            return response()->json([
                'message'   => $message
            ],200);
        }catch (\Exception $e){
            return response()->json([
                //'message'   => $e->getMessage()
                'message'   => 'Sorry! Something wents wrong. Please try again later.'
            ],200);
        }
    }

    public function getAllAppointments($id, $date){
        $date = Carbon::parse($date)->format('Y-m-d');
        $day = Carbon::parse($date)->format('w');
        $doctor = Doctor::find($id);
        $openingDay = DoctorOpening::where('doctor_id',$doctor->id)->where('opening_day_id',$day)->first();
        $appointments = Appointment::where('doctor_id',$id)->where('appointment_date',$date)->get();
        $serials = $appointments->pluck('sl_no');
        return response()->json([
            'max_appointment'   => $openingDay ? $openingDay->max_appointment : 0,
            'serials'           => $serials
        ],200);
    }

    public function getAllAppointmentList($id, $date){
        $doctor = Doctor::findOrFail($id);
        $date = Carbon::parse($date)->format('Y-m-d');
        //return [$doctor,$date];
        $appointments = Appointment::with(['doctor'])->where('doctor_id',$id)->where('appointment_date',$date)->get();
        return response()->json([
            'appointments'  => $appointments
        ],200);
    }

    public function downloadAppointmentList($id, $date){
        $doctor = Doctor::findOrFail($id);
        $date = Carbon::parse($date)->format('Y-m-d');
        $appointments = Appointment::with(['doctor'])->where('doctor_id',$id)->where('appointment_date',$date)->get();
        $pdf = PDF::loadView('pdf.appointments', [
            'appointments'  => $appointments
        ]);
        return $pdf->download('appointments.pdf');
        return response()->json([
            'appointments'  => $appointments
        ],200);
    }

    public function downloadAllAppointments(){
        $date = Carbon::now()->format('Y-m-d');
        $appointments = Appointment::with(['doctor'])->where('appointment_date','>=',$date)->orderBy('id','desc')->get();
        $pdf = PDF::loadView('pdf.appointments', [
            'appointments'  => $appointments
        ]);
        return $pdf->download('appointments.pdf');
    }

    private function sendSms($message,$contact){
        $ch = curl_init();
        $data = http_build_query([
            'api_key' => 'C20014345b3881ed5066b8.94213624',
            'type' => 'text',
            'contacts' => $contact,
            'msg'   => $message,
            'senderid'  => "FarazyDenta"
        ]);
        $url = "http://sms.winskit.com/smsapi";
        $getUrl = $url."?".$data;
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);

        $response = curl_exec($ch);

        if(curl_error($ch)){
            //dd('Request Error:' . curl_error($ch));
        }
        else
        {
            //echo $response;
        }

        curl_close($ch);
    }


}
