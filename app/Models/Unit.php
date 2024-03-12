<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'actual_name',
        'short_name',
        'allow_decimal',
        'created_by',
    ];

}
