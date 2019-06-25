<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','image','description','category_id'];
    protected $appends = ['url','thumb'];
    

    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    
    public function getUrlAttribute()
    {
        return route('api-tips-details',$this->id);
    }

    public function getThumbAttribute()
    {
        return asset($this->attributes['image']);
    }
}
