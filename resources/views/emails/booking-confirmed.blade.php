@component('mail::message')
Votre réservation a été confirmée :

@component('mail::panel')
Votre réservation du {{ $booking->start->format('d/m/Y') }} au {{ $booking->end->format('d/m/Y') }} pour {{
$booking->nb_people }} personnes a été validée par l'hôte.
@endcomponent

@component('mail::button', ['url' => $url])
Voir ma réservation
@endcomponent
@endcomponent