<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
    ];

    public function likes()
    {
        return $this->morphToMany('App\Like', 'likable');
    }
}
