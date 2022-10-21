<?php

namespace App\Services;

use App\Models\Booking;

class BookingAvailabilityService
{

    public static function getAvailableDates()
    {
        return Booking::whereDate('to', '>=', now())->select('from', 'to')->get();
    }
}
