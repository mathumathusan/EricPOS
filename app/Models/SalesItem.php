<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id',
        'product_id',
        'qty',
        'unit_amount',
        'sub_total',
        'discount',
        'total',
        'job_order_id',
    ];

    protected $casts = [];

    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function jobOrder()
    {
        return $this->belongsTo(JobOrder::class, 'job_order_id');
    }

}
