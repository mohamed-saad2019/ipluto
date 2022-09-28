<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{

    protected $table = 'videos'; 

    protected $fillable = [

	    'id ', 'title', 'subject_id', 'grade_id','path_background','path_video','created_by',
	    'created_at', 'updated_at','unit','status'
	];


   public function admin()
    {
      return $this->hasOne('\App\User', 'id','created_by');
    }

    public function subject()
    {
      return $this->hasOne('\App\ChildCategory', 'id','subject_id');
    }

    public function grade()
    {
      return $this->hasOne('\App\subcategory', 'id','grade_id');
    }

    
}
