<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CorporatePartner extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','partner_image','slide_order'];
}
