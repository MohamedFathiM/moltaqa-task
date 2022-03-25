<?php

namespace App\Traits;

use Carbon\Carbon;

trait Timestamp
{
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getJoinedDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
