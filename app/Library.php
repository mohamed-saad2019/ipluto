<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'library';

    protected $fillable = [ 
        'type',
        'instructor_id',
        'class_id',
        'lesson_id',
        'grade_id',
        'unit',
        'price',
        'title',
        'info',
    ];


    public function lesson()
    {
        return $this->belongsTo('App\Lessons','lesson_id','id');
    }

     public function class()
    {
        return $this->belongsTo('App\Classes','class_id','id');
    }


    
}
