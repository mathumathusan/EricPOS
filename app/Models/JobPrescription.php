<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPrescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_order_id',
        'right_sph',
        'right_cyl',
        'right_axis',
        'right_add',
        'right_pd',
        'left_sph',
        'left_cyl',
        'left_axis',
        'left_add',
        'left_pd',
        'of_sf',
        'professional_type',
        'professional_name',
        'hospital_name',
        'product_id',
    ];


    public function jobOrder()
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
