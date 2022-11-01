<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibraryFile extends Model
{
    protected $table = 'library_file';

    protected $fillable = [ 
        'file_name',
        'hash_name',
        'size',
        'path',
        'mime_type',
        'url',
        'file_type',
        'library_id',
        'instructor_id  ',
    ];


    
}
