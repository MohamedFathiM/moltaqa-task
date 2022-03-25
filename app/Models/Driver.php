<?php

namespace App\Models;

use App\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory, Timestamp;

    protected $fillable = [
        'joined_date',
        'current_latitude',
        'current_longitude',
        'location',
    ];

}
