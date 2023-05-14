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

     public function childcategory()
    {
      return $this->belongsTo('App\ChildCategory', 'subject_id','id');
    }

     public function instructor()
    {
        return $this->belongsTo('App\User','instructor_id','id');
    }
}
