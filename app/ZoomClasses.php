<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoomClasses extends Model
{
    protected $table = 'zoom_classes';
    protected $fillable = ['id' , 'zoom_id' , 'class_id' ] ;


    
}
