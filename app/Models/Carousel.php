<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Carousel extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'order',
        'is_active'
    ];

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        return $this->image 
            ? Storage::url($this->image) 
            : null;
    }
}