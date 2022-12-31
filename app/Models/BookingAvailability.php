<?php

namespace App\Models;

use Spatie\Period\Period;
use App\Enums\BookingStatus;
use Spatie\Period\PeriodCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingAvailability extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['from', 'to'];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'from' => 'date:Y-m-d',
        'to' => 'date:Y-m-d',
    ];

    public static function getAvailableDates()
    {
        $availabilities = self::whereDate('to', '>=', now())->select('from', 'to')->get();
        $availabilitiesCollection = $bookingsCollection = new PeriodCollection();
        $bookings = Booking::where('status', BookingStatus::Validated)->select('start', 'end')->get();

        // Avec le package spatie/period, calcul de la différence suivante: "périodes_disponibles - périodes_réservées"
        // Création des collections de dates
        foreach ($availabilities as $availability) {
            $availabilitiesCollection = $availabilitiesCollection->add(Period::make($availability['from'], $availability['to']));
        }
        $boundaries = $availabilitiesCollection->boundaries();
        $gaps = $availabilitiesCollection->gaps();
        $availabilitiesCollection = new PeriodCollection();
        $availabilitiesCollection = $availabilitiesCollection->add($boundaries);
        $availabilitiesCollection = $availabilitiesCollection->subtract($gaps);
        foreach ($bookings as $booking) {
            $bookingsCollection = $bookingsCollection->add(Period::make($booking['start'], $booking['end']));
        }

        $availabilities = [];
        foreach ($availabilitiesCollection as $availability) {
            $availabilities[] = new BookingAvailability([
                'from' => $availability->start()->format('Y-m-d'),
                'to' => $availability->end()->format('Y-m-d'),
            ]);
        }

        $availabilitiesWithBooked = [];
        // Calcul de la différence et création d'un tableau de périodes disponibles
        foreach ($availabilitiesCollection->subtract($bookingsCollection) as $availability) {
            $availabilitiesWithBooked[] = [
                'from' => $availability->start()->format('Y-m-d'),
                'to' => $availability->end()->format('Y-m-d'),
            ];
        }

        return ['availabilities' => $availabilities, 'bookings' => $bookings, 'availabilitiesWithBooked' => $availabilitiesWithBooked];
    }
}
