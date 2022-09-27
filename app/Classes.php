<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $fillable = ['id' , 'name' , 'instructor_id' , 'grade_id' , 'duration' , 'status','created_at'] ;

}
