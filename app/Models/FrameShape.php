<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrameShape extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code_no',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
