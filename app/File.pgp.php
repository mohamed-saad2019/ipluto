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
    ];
}
