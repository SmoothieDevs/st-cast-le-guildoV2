<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum BookingStatus: string
{
    use EnumToArray;

    case PendingVerification = 'pending-verification';
    case PendingConfirmation = 'pending-confirmation';
    case PendingPayment = 'pending-payment';
    case Validated = 'validated';
    case Cancelled = 'cancelled';
    case Finished = 'finished';

    public function label(): string
    {
        return match ($this) {
            static::PendingVerification => 'Pending verification',
            static::PendingConfirmation => 'Pending confirmation',
            static::PendingPayment => 'Pending payment',
            static::Validated => 'Validated',
            static::Cancelled => 'Cancelled',
            static::Finished => 'Finished',
        };
    }
}
