<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cus_id',
        'cus_code',
        'location_id',
        'cus_name',
        'email',
        'address',
        'dob',
        'mobile',
        'phone',
        'remark',
        'created_by',
        'is_active',
    ];

    protected $dates = [
        'dob', // Assuming 'dob' is a date field
    ];


    protected $casts = [
        'is_active' => 'boolean',
    ];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            
            $locationCode = $customer->location->store_code;

            $lastCustomerId = Customer::withTrashed()->max('id');

            $newCusId = ($lastCustomerId !== null) ? $lastCustomerId + 1 : 1;

           
            $newCusCode = $locationCode . str_pad($newCusId, 5, '0', STR_PAD_LEFT);

    
            while (Customer::where('cus_code', $newCusCode)->exists()) {
                $newCusId++;
                $newCusCode = $locationCode . str_pad($newCusId, 5, '0', STR_PAD_LEFT);
            }

            $customer->cus_id = $newCusId;
            $customer->cus_code = $newCusCode;
        });
    }




    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}