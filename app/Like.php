<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = [ 
        'id',
        'like',
        'video_id',
        'comment_id',
        'reply_id',
        'instructor_id',
        'student_id',
        'created_at',
        'updated_at'
    ];

    public function student(){
        return $this->hasOne(User::class,'id','student_id');
    }

    public function instructor(){
        return $this->hasOne(User::class,'id','instructor_id');
    }

    
}
