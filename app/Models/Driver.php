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

    public static function nearestDrivers()
    {
        return static::selectRaw(
            'SQRT(POW(69.1*(current_latitude - ?) ,2) + POW(69.1 * (? - current_longitude) * COS(current_latitude / 57.3),2)) As distance',
            [auth()->user()->lat, auth()->user()->lng]
        )
            ->addSelect('id', 'current_latitude', 'current_longitude', 'location')
            ->orderBy('distance')
            ->take(3)
            ->get();
    }
}
