<?php

namespace App\Model\Item;

use App\Observer\ObserverTrait;
use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    protected $fillable = [
        'item_group_name',
        'parent_id',
    ];

    public function parent(){
        return $this->belongsTo('App\Model\Item\ItemGroup','parent_id','id');
    }
}
