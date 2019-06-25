<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'prescription_id',
        'doctor_id',
        'patient_name',
        'contact_no',
        'age',
        'prescription_date',
        'rx',
        'gender'
    ];

    public function doctor(){
        return $this->belongsTo('App\Model\Doctor','doctor_id','id');
    }

    public function medicines(){
        return $this->hasMany('App\Model\PrescriptionMedicine','prescription_id','id');
    }
    public function advices(){
        return $this->hasMany('App\Model\PrescriptionAdvice','prescription_id','id');
    }
    public function tests(){
        return $this->hasMany('App\Model\PrescriptionTest','prescription_id','id');
    }
}
