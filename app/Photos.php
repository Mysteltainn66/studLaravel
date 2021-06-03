<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'path', 'name', 'category_id', 'user_id'
    ];
}
