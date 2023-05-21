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


    public function classes()
    {
        return $this->belongsToMany(Classes::class,'share_lessons','lesson_id','class_id');
    } 
    
    public function subject()
    {
      return $this->hasOne('\App\ChildCategory', 'id','subject');
    }

    public function grade()
    {
      return $this->hasOne('\App\SubCategory', 'id','grade');
    }

}
