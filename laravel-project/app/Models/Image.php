<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'restaurant_id',
        'filename',
        'mime_type',
        'url',
    ];
}
