<?php

namespace App\Listeners;

use App\Enums\BookingStatus;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingPendingConfirmation;

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
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        return [
            Verified::class => 'handleEmailVerification',
        ];
    }
}
