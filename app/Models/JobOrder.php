<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'customer_id',
        'job_no',
        'job_code',
        'job_date',
        'due_date',
        'frame_amount',
        'lens_amount',
        'paid_amount',
        'discount_amount',
        'balance_amount',
        'test_by',
        'take_by',
        'remarks',
        'created_by',
        'status'
    ];

    protected $dates = ['job_date', 'due_date'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function prescription()
    {
        return $this->belongsTo(JobPrescription::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function sales()
    {
        return $this->hasMany(Sales::class, 'job_order_id');
    }

    public function salesItems()
    {
        return $this->hasMany(SalesItem::class, 'job_order_id');
    }

}
