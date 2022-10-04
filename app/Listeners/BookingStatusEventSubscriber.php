<?php

namespace App\Listeners;

use App\Enums\BookingStatus;
use App\Mail\BookingCancelled;
use App\Mail\BookingCancelledAdmin;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingPendingConfirmation;
use App\Events\BookingCancelled as BookingCancelledEvent;

class BookingStatusEventSubscriber
{
    /**
     * Gère la vérification de l'email de l'utilisateur.
     *
     * @param  \App\Events\Verified  $event
     * @return void
     */
    public function handleEmailVerification(Verified $event)
    {
        $user = $event->user;

        if ($user->booking) {
            $user->booking->status = BookingStatus::PendingConfirmation;
            $user->booking->save();
            Mail::to(config('admin.email'))->queue(new BookingPendingConfirmation($user, $user->booking));
        }
    }

    /**
     * Gère la vérification de l'email de l'utilisateur.
     *
     * @param  \App\Events\BookingCancelled  $event
     * @return void
     */
    public function handleBookingCancellation(BookingCancelledEvent $event)
    {
        $booking = $event->booking;

        if ($booking->user) {
            $booking->status = BookingStatus::Cancelled;
            $booking->save();
            // Mail à l'utilisateur confirmant l'annulation de sa réservation, et mail à l'admin pour l'informer de l'annulation
            Mail::to($booking->user->email)->queue(new BookingCancelled($booking));
            Mail::to(config('admin.email'))->queue(new BookingCancelledAdmin($booking));
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        return [
            Verified::class => 'handleEmailVerification',
            BookingCancelledEvent::class => 'handleBookingCancellation',
        ];
    }
}
