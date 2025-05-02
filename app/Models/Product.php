<?php

namespace App\Models;

use App\Enums\BarcodeType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'product_code',
        'product_name',
        'type',
        'unit_id',
        'product_img',
        'brand_id',
        'price',
        'category_id',
        'sub_category_id',
        'enable_stock',
        'alert_quantity',
        'barcode_type',
        'created_by',
        'is_active',
    ];


    protected $casts = [
        'is_active' => 'boolean',
        'enable_stock' => 'boolean',
        'barcode_type' => BarcodeType::class
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
