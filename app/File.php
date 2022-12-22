<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'lessons_file';

    protected $fillable = [ 
        'file_name',
        'size',
        'hash_name',
        'path',
        'mime_type',
        'file_type',
        'relation_id',
        'lesson_id',
        'instructor_id',
        'library_id',
        'likes',
        'dislikes',
        'viewers',
        
    ];

    public function instructor(){
        return $this->hasOne(User::class,'id','instructor_id');
    }

     public function lesson(){
        return $this->hasOne(Lessons::class,'id','lesson_id');
    }

     public function library(){
        return $this->hasOne(Library::class,'id','library_id');
    }

}
