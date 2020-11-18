<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

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
