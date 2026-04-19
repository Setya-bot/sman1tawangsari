<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $table = 'ekskuls';

    protected $fillable = [
        'name', 'slug', 'image', 'description', 'pembina', 'instagram'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image 
            ? asset('storage/' . $this->image) 
            : asset('images/no-image.png');
    }
}