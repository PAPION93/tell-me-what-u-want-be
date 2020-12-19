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
    public function scopeLat($query, $southLat, $northLat)
    {
        if ($southLat && $northLat) {
            return $query->whereBetween('lat', [$southLat, $northLat]);
        }
    }

    /**
     * Scope a query to latitude
     */
    public function scopeLng($query, $westLng, $eastLng)
    {
        if ($westLng && $eastLng) {
            return $query->whereBetween('lng', [$westLng, $eastLng]);
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
