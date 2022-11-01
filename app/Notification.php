<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [ 
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
        'admin_id',
        'instructor_id',
        'student_id',
        'reading',
        'created_by',
    ];

     public function user()
    {
      return $this->hasOne('\App\User', 'id','created_by');
    }

    
}
