<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorsSubjects extends Model
{
	protected $table = 'instructors_subjects'; 
	
    // instructor_id
    protected $fillable = ['instructor_id','subject_id','status','created_at','updated_at'];
    public function subject()
    {
    	return $this->belongsTo('App\ChildCategory','subject_id','id');
    }

    public function instructor()
    {
        return $this->belongsTo('App\User','instructor_id','id');
    }
    

}
