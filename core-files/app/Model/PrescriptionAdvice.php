<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescriptionAdvice extends Model
{
    use SoftDeletes;
    protected $fillable = ['prescription_id','advice_id'];

    public function advice(){
        return $this->belongsTo('App\Model\Advice','advice_id','id');
    }
}
