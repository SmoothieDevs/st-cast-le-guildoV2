<?php

namespace App\Listeners;

use App\Enums\BookingStatus;
use Illuminate\Auth\Events\Verified;

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
