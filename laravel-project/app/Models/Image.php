<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'restaurant_id',
        'url',
        'hash_name',
        'original_name',
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
}
