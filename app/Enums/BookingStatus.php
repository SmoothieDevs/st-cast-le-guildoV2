<?php

namespace App\Enums;

enum BookingStatus: string
{
    case NeedPayment = 'need_payment';
    case PaidFor = 'paid_for';
    case Confirmed = 'confirmed';
    case Cancelled  = 'cancelled';
    case Finished = 'finished';

    public static function getValues(): array
    {
        return array_column(BookingStatus::cases(), 'value');
    }
}
