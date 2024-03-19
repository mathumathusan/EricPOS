<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoatingBrand extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'created_by',
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
