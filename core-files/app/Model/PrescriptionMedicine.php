<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescriptionMedicine extends Model
{
    use SoftDeletes;
    protected $fillable = ['prescription_id','medicine_id','duration','doses','before_eat'];
    public function medicine(){
        return $this->belongsTo('App\Model\Item\Item','medicine_id','id');
    }
}
