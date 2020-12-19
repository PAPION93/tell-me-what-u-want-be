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
    public function scopeLat($query, $northLat, $southLat)
    {
        if ($northLat && $southLat) {
            return $query->whereBetween('lat', [$northLat, $southLat]);
        }
    }

    /**
     * Scope a query to latitude
     */
    public function scopeLng($query, $eastLng, $westLng)
    {
        if ($eastLng && $westLng) {
            return $query->whereBetween('lng', [$eastLng, $westLng]);
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
