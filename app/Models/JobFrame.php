<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobFrame extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'brand_id',
        'model_no',
        'type',
        'option',
        'shape_id',
        'lens_variety',
        'lens_index',
        'lens_type',
        'coating_brand',
        'coating_brand_id',
        'coating_option_id',
        'tint',
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }



}
