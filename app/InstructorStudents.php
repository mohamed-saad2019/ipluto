<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorStudents extends Model
{
    protected $table = 'instructor_students';

    protected $fillable = [ 
        'instructor_id',
        'student_id',
        'status',
        'type',
        'created_at',
        'updated_at',
    ];

      public function student()
    {
        return $this->belongsTo('App\User','student_id','id');
    }
}
