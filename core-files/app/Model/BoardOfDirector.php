<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardOfDirector extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','designation_id','image','in_home','sl_no','description'];

    public function designation(){
        return $this->belongsTo('App\Model\Designation','designation_id','id');
    }
}
