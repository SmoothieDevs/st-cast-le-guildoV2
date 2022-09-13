<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Enums\BookingStatus;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SetBookingFinished implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The bookings instance.
     *
     * @var Booking
     */
    private $bookings;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user = null)
    {
        // Recherche de toutes les réservations "actives" (pas marquées terminées ou annulées) et dont la date de fin est passée
        $query = Booking::whereNotIn('status', [BookingStatus::Finished->value, BookingStatus::Cancelled->value])
            ->where('end', '<', now());

        if ($user) {
            // Si un utilisateur est passé en paramètre restriction de la recherche à ses réservations
            $query->where('user_id', $user->id);
        }

        $this->bookings = $query->get();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->bookings as $booking) {
            $booking->status = BookingStatus::Finished;
            $booking->save();
        }
    }
}
