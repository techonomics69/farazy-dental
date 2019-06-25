<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BasicSetting extends Model
{
    protected $fillable = [
        'app_name','phone','email','mobile','description','address','facebook','twitter','google_plus','linkedin','logo','youtube'
    ];
}
