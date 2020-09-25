<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function users()
    {
        return $this->morphedByMany('App\Models\User', 'likable');
    }

    public function restaurants()
    {
        return $this->morphedByMany('App\Models\Restaurant', 'likable');
    }
}
