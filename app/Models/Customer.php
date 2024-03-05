<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'cus_id',
        'location_id',
        'cus_name',
        'email',
        'address',
        'dob',
        'mobile',
        'phone',
        'remark',
        'is_active',
    ];

    protected $dates = [
        'dob', // Assuming 'dob' is a date field
    ];


    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
