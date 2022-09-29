<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folders extends Model
{
    protected $table = 'lessons_folders';

    protected $fillable = [ 
        'name',
        'instructor_id',
        'parent_id',
        'color'
    ];
}
