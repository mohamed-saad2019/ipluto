<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{

    protected $table = 'videos'; 

    protected $fillable = [

	    'id ', 'title', 'subject_id', 'grade_id','path_background','path_video','created_by',
	    'created_at', 'updated_at'
	];





    
}
