<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'  => 'cors'],function(){
    
    
});

Route::get('/dental-tips',function(){
        $posts['tips'] = \App\Post::orderBy('id','desc')->get();
        return $posts;
    });
    Route::get('tips/details/{id}',function($id){
        return \App\Post::findOrFail($id);
    })->name('api-tips-details');
    Route::get('/departments',function(){
        $departments['departments'] = \App\Model\Department::orderBy('title','asc')->get();
        return $departments;
    });
    
    Route::post('/doctors',function(){
        $doctors['doctors'] = \App\Model\Doctor::orderBy('name','asc')->get();
        return $doctors;
    });
    
    Route::get('get-appointment/{id}/{date}',function ($id,$date){
        $date = \Carbon\Carbon::parse($date)->format('Y-m-d');
        $day = \Carbon\Carbon::parse($date)->format('w');
        $doctor = \App\Model\Doctor::find($id);
        $openingDay = \App\Model\DoctorOpening::where('doctor_id',$doctor->id)->where('opening_day_id',$day)->first();
        $appointments = \App\Model\Appointment::where('doctor_id',$id)->where('appointment_date',$date)->get();
        $serials = $appointments->pluck('sl_no');
        return [
            'max_appointment'   => $openingDay ? $openingDay->max_appointment : 0,
            'serials'           => $serials
        ];
    });
    
    Route::post('post-appointment/{id}','AppointmentController@apiStore');
    
