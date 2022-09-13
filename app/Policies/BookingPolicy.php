<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Booking;
use App\Enums\BookingStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(?User $user)
    {
        // L'utilisateur n'est pas connecté OU l'utilisateur n'a pas de réservation en cours
        return $user === null || !($user->booking != null);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Booking $booking)
    {
        return $user->id === $booking->user_id && $booking->status != BookingStatus::Finished;
    }
}
