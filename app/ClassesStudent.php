<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassesStudent extends Model
{
    protected $table = 'classes_student';
    protected $fillable = ['id' , 'class_id' , 'teacher_id' , 'student_id' , 'status' ,'created_at'] ;

    public function student()
    {
        return $this->belongsTo('App\User','student_id','id');
    }

     public function class()
    {
        return $this->belongsTo('App\Classes','class_id','id');
    }
    
}
