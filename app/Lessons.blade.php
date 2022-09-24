<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $table = 'instructor_lessons';

    protected $fillable = [ 
        'name',
        'instructor_id',
        'des',
        'last_lesson',
    ];
}
