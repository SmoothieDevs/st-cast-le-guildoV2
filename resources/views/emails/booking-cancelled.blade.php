@component('mail::message')
Réservation annulée :

@component('mail::panel')
Votre réservation du {{ $booking->start->format('d/m/Y') }} au {{
$booking->end->format('d/m/Y') }} a bien été annulée.
@endcomponent
@endcomponent