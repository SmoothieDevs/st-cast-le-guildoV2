<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingPendingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Booking $booking)
    {
        $this->user = $user;
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouvelle réservation')->markdown('emails.booking-pending-confirmation', [
            'user' => $this->user,
            'booking' => $this->booking,
            'url' => route('admin.dashboard')
        ]);
    }
}
