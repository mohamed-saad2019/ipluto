<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorsSubjects extends Model
{
	protected $table = 'instructors_subjects'; 
	
    public function subject()
    {
    	return $this->belongsTo('App\ChildCategory','subject_id','id');
    }
    

}
