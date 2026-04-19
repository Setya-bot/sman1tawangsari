<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;

    protected $table = 'administrators';

    protected $fillable = [
        'image',
        'name',
        'role',
        'keterangan',
        'nip',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Optional: Accessor untuk menampilkan gambar
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('assets/images/default-avatar.png'); // sesuaikan dengan default image kamu
    }
}