<?php

namespace App\Model\Item;

use App\Observer\ObserverTrait;
use Illuminate\Database\Eloquent\Model;

class ItemGeneric extends Model
{
    protected $fillable = [
        'item_generic_name',
        'th_class_id',
    ];

    public function therapetricClass(){
        return $this->belongsTo('App\Model\Item\ItemThClass','th_class_id','id');
    }
}
