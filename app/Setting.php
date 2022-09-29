<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';

    protected $fillable = ['logo', 'favicon', 'paytm_enable', 'project_title', 'promo_text', 'donation_link', 'notification_enable','size_lesson_videos'];

    protected $casts = [
        'ipblock' => 'array'
    ];
}
