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
        'saved',
        'subject',
        'grade',
        'folder_id',
        'ensure_save',
        'unit',
        'size',
        'change_default_name'
    ];
}
