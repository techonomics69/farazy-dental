<?php

namespace App\Model\Item;

use App\Observer\ObserverTrait;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $fillable = [
        'item_type_name',
    ];
}
