<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescriptionTest extends Model
{
    use SoftDeletes;
    protected $fillable = ['prescription_id','test_id','comment'];
    public function test(){
        return $this->belongsTo('App\Model\Test','test_id','id');
    }
}
