<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [ 
        'id',
        'video_id',
        'student_id',
        'instructor_id',
        'lesson_id',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function student(){
        return $this->hasOne(User::class,'id','student_id');
    }

    public function instructor(){
        return $this->hasOne(User::class,'id','instructor_id');
    }
    
}
