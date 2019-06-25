<?php

namespace App\Model\Item;

use App\Observer\ObserverTrait;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name',
        'item_generic_id',
        'item_group_id',
        'item_party_id',
        'item_unit_id',
        'item_mrp',
        'item_unit_mrp',
        'item_reorder_value',
        'item_type_id',
        'item_strength',
        'item_pack_size',
        'active',
    ];

    public function generic(){
        return $this->belongsTo('App\Model\Item\ItemGeneric','item_generic_id','id');
    }

    public function itemGroup(){
        return $this->belongsTo('App\Model\Item\ItemGroup','item_group_id','id');
    }

    public function type(){
        return $this->belongsTo('App\Model\Item\ItemType','item_type_id','id');
    }

    public function manufacturer(){
        return $this->belongsTo('App\Model\Party\Party','item_party_id','id');
    }
}
