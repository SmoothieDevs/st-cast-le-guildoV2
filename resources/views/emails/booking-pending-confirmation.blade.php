@component('mail::message')
Nouvelle réservation en attente de confirmation :

@component('mail::panel')
{{ $user->firstname }} ({{ $user->email }}) a réservé du {{ $booking->start->format('d/m/Y') }} au {{
$booking->end->format('d/m/Y') }} pour {{ $booking->nb_people }} personnes.
@endcomponent

Se rendre sur le panneau d'administration pour confirmer ou refuser la réservation :

@component('mail::button', ['url' => $url])
Panneau d'administration
@endcomponent
@endcomponent