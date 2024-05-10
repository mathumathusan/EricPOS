<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'customer_id',
        'sales_date',
        'sales_by',
        'created_by',
        'sub_total',
        'discount',
        'total',
        'balance',
        'job_order_id',
        'status'
    ];

    protected $dates = ['sales_date'];


    // public function location()
    // {
    //     return $this->belongsTo(Location::class);
    // }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function jobOrder()
    {
        return $this->belongsTo(JobOrder::class, 'job_order_id');
    }
    
    public function items()
    {
        return $this->hasMany(SalesItem::class, 'sales_id');
    }
}
