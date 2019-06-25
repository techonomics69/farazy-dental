<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['doctor_id','appointment_date','patient_name','contact_no','sl_no','email'];

    public function doctor(){
        return $this->belongsTo('App\Model\Doctor','doctor_id','id');
    }

    public function setAppointmentDateAttribute($value)
    {
        $this->attributes['appointment_date'] = Carbon::parse($value)->format('Y-m-d');
    }
}
