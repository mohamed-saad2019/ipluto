<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareLessons extends Model
{
    protected $table = 'share_lessons';
    protected $fillable = ['id' , 'lesson_id' , 'class_id' ,'instructor_id', 'student_id' , 'type' ,'created_at','updated_at'] ;

    public function student()
    {
    	return $this->belongsTo('App\User','student_id','id');
    }
}
