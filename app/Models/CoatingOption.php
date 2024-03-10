<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoatingOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'coating_brand_id',
        'name',
        'is_active',
    ];


    protected $casts = [
        'is_active' => 'boolean',
    ];


    public function coatingBrand()
    {
        return $this->belongsTo(CoatingBrand::class);
    }

    public function jobFrames()
    {
        return $this->hasMany(JobFrame::class);
    }
}
