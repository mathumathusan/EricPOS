<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoatingOption extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'coating_brand_id',
        'created_by',
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
