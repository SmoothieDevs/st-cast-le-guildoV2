@component('mail::message')
Réservation annulée :

@component('mail::panel')
{{ $user->firstname }} ({{ $user->email }}) a annulé sa réservation du {{ $booking->start->format('d/m/Y') }} au {{
$booking->end->format('d/m/Y') }}.
@endcomponent

Se rendre sur le panneau d'administration :

@component('mail::button', ['url' => $url])
Panneau d'administration
@endcomponent
@endcomponent