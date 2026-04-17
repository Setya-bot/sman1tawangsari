<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $fillable = [
        'school_name',
        'address',
        'phone',
        'email',
        'logo',
        'vision',
        'mission',
        'motto',
        'yelyel',
        'mars',
    ];
}
