<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replys';

    protected $fillable = [ 
        'id',
        'comment_id',
        'reply',
        'student_id',
        'instructor_id',
        'likes',
        'dislikes',
        'created_at',
        'updated_at',
    ];

    public function student(){
        return $this->hasOne(User::class,'id','student_id');
    }

    public function instructor(){
        return $this->hasOne(User::class,'id','instructor_id');
    }

    public function comment(){
        return $this->hasOne(Comment::class,'id','comment_id');
    }
    
}
