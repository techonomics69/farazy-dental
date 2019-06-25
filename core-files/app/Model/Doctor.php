<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','designation_id','department_id','specialization','max_appointment','email','contact_no','phone','photo','appoint_time'];
    protected $appends = ['url','thumb'];
    public function designation(){
        return $this->belongsTo('App\Model\Designation','designation_id','id');
    }

    public function department(){
        return $this->belongsTo('App\Model\Department','department_id','id');
    }

    public function openings(){
        return $this->hasMany('App\Model\DoctorOpening','doctor_id','id');
    }

    public function user(){
        return $this->hasOne('App\User','type_ref','id');
    }

    public function getUrlAttribute()
    {
        return route('api-tips-details',$this->id);
    }

    public function getThumbAttribute()
    {
        return asset($this->attributes['photo']);
    }
}
