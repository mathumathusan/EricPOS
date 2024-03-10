<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoatingBrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
    ];


    protected $casts = [
        'is_active' => 'boolean',
    ];


    public function coatingOptions()
    {
        return $this->hasMany(CoatingOption::class);
    }

    public function jobFrames()
    {
        return $this->hasMany(JobFrame::class);
    }
}
