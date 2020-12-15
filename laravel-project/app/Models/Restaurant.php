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

    /**
     * Scope a query to name
     */
    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%{$name}%");
        }
    }

    /**
     * Scope a query to category
     */
    public function scopeCategory($query, $category)
    {
        if ($category) {
            return $query->where('category', 'LIKE', "%{$category}%");
        }
    }

    public function scopeGooglePoint($query, $point)
    {
        if ($point) {
            return $query->whereBetween('google_point', [$point, 5]);
        }
    }

    public function scopeNaverPoint($query, $point)
    {
        if ($point) {
            return $query->whereBetween('naver_point', [$point, 5]);
        }
    }

    public function scopeDiningPoint($query, $point)
    {
        if ($point) {
            return $query->whereBetween('dining_point', [$point, 5]);
        }
    }

    /**
     * Scope a query to latitude
     */
    public function scopeLat($query, $lat)
    {
        if ($lat) {
            return $query->whereBetween('lat', [$lat - 0.0005, $lat + 0.0005]);
        }
    }

    /**
     * Scope a query to latitude
     */
    public function scopeLng($query, $lng)
    {
        if ($lng) {
            return $query->whereBetween('lng', [$lng - 0.0005, $lng + 0.0005]);
        }
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
