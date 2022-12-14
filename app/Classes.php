<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $fillable = ['id' , 'name' , 'instructor_id' , 'grade_id' , 'duration','subject_id', 'status','created_at'] ;


    public function sharelesson()
    {
    	return $this->hasMany('App\ShareLessons','class_id');
    }

    public function grade()
    {
      return $this->hasOne('\App\SubCategory', 'id','grade_id');
    }
}
