<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    protected $table = 'zoom';
    protected $fillable = ['id' , 'start_time' , 'now' , 'instructor_id' , 'code' , 'url','other','created_at' ,'updated_at'] ;


     public function ZoomClasses()
    {
       return $this->hasMany('App\ZoomClasses','zoom_id','id');
    }
}
