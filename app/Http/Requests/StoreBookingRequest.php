<?php

namespace App\Http\Requests;

use App\Models\Booking;
use App\Enums\BookingStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'nb_people' => 'required|integer|min:1',
            'email' => 'email|string|max:255|unique:users',
            'firstname' => 'string|max:255|required_with:email',
            'lastname' => 'string|max:255|required_with:email',
        ];
    }

    /**
     * Assure que l'utilisateur n'a pas déjà une réservation en cours.
     *
     * @return null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureDoesNotHaveActiveBooking()
    {
        if (!$this->user()->booking) {
            // La relation renvoie null => pas de réservation en cours
            return;
        } elseif ($this->user()->booking->end < now()) {
            // La relation renvoie une réservation passée => autorisation d'en créer une nouvelle
            $this->user()->booking->status = BookingStatus::Finished;
            $this->user()->booking->save();
            return;
        }

        // Il existe une réservation en cours => levée d'une erreur
        throw ValidationException::withMessages([
            'user_id' => 'Vous avez déjà une réservation en cours.'
        ]);
    }

    /**
     * Assure que les dates sélectionnées sont disponibles.
     *
     * @return null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureDatesAreAvailable()
    {
        // Obtention de toutes les réservations actives terminant après le début de la réservation, ou commençant avant la fin de la réservation
        $bookings = Booking::where('end', '>=', $this->start)
            ->where('start', '<=', $this->end)
            ->get();

        // Il existe au moins une réservation avec des dates en conflit => levée d'une erreur
        if ($bookings->count() > 0) {
            throw ValidationException::withMessages([
                'start' => 'Les dates demandées ne sont pas disponibles.'
            ]);
        }
    }
}
