<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class InstructorGrade extends Model
{
    use HasTranslations;
    
    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    use HasTranslations;
    
    public $translatable = ['title'];


    protected $table = 'instructors_grade';   

    protected $fillable = [
		  'id', 'instructor_id','subject_id','grade_id', 'status'
    ]; 

    public function subcategory()
    {
    	return $this->hasMany('App\SubCategory','id','grade_id');
    }

    public function course()
    {
        return $this->belongsTo('App\ChildCategory','subject_id','id');
    }

     public function grade()
    {
        return $this->belongsTo('App\SubCategory','grade_id','id');
    }

     public function instructor()
    {
        return $this->belongsTo('App\User','instructor_id','id');
    }
}
