<?php

namespace App\Model\Party;

use App\Observer\ObserverTrait;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{

    protected $fillable = [
        'party_name',
    ];
}
