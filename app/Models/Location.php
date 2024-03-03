<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'store_code',
        'address',
        'phone',
        'mobile',
        'email',
        'website',
        'social_media',
        'default_language',
        'is_active',
    ];

    protected $casts = [
        'social_media' => 'json',
    ];
}
