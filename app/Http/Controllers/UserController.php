<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Enums\BookingStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BookingAvailability;
use App\Http\Resources\BookingResource;

class UserController extends Controller
{
    /**
     * Affiche la page personnelle de l'utilisateur
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function dashboard(Request $request)
    {
        if ($request->user()->isAdministrator()) {
            $bookings =  Booking::whereNot('status', BookingStatus::Finished)->with('user')->paginate();

            foreach ($bookings as $booking) {
                if ($booking->status === BookingStatus::PendingConfirmation) {
                    $booking->actions = [
                        'Confirm' => route('booking.confirm', $booking),
                        'Cancel' => route('booking.cancel', $booking),
                    ];
                }
            }

            $nbAvailableDays = 0;
            foreach (BookingAvailability::getAvailableDates()['availabilitiesWithBooked'] as $availability) {
                $nbAvailableDays += Carbon::parse($availability['from'])
                    ->diffInDays(Carbon::parse($availability['to'])) + 1;
            }

            return view('admin.dashboard')->with([
                'bookings' => BookingResource::collection($bookings),
                'nbAvailableDays' => $nbAvailableDays,
            ]);
        } else {
            $booking =  auth()->user()->booking;
            $finishedBookings = auth()->user()->finishedBookings;

            return view('dashboard')->with(compact('booking', 'finishedBookings'));
        }
    }
}
