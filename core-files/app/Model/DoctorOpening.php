<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DoctorOpening extends Model
{
    protected $fillable = ['doctor_id','opening_day_id','opening_day','start_time','end_time','max_appointment'];

}
