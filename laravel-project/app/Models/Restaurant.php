<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'address',
        'google_point',
        'naver_point',
        'dining_point',
        'lat',
        'lng',
    ];

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
