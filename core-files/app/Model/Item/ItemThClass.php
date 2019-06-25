<?php

namespace App\Model\Item;

use App\Observer\ObserverTrait;
use Illuminate\Database\Eloquent\Model;

class ItemThClass extends Model
{
    protected $fillable = [
        'th_class_name',
    ];


}
