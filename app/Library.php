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


    
}
