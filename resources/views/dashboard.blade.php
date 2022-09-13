<p>Bienvenue {{ auth()->user()->firstname }}</p>

<div style="border: solid;padding: 10px;margin: 10px;">
    @if(isset($booking))
    @if($booking->status->value === 'cancelled')
    <p>Vous avez une réservation annulée</p>
    <a href="{{ route('booking.create') }}">Faire une nouvelle réservation</a>
    @else
    <p>Vous avez une réservation en cours</p>
    <p>Du {{ $booking->start->format('Y-m-d') }} au {{ $booking->end->format('Y-m-d') }}</p>
    <p>Nombre de personnes : {{ $booking->nb_people }}</p>
    <form action="{{ route('booking.edit', ['booking' => $booking->id]) }}">
        <button type="submit">{{ __('Éditer') }}</button>
    </form>
    <form method="POST" action="{{ route('booking.cancel', ['booking' => $booking->id]) }}">
        @csrf
        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
            {{ __('Annuler ma réservation') }}
        </button>
    </form>
    @endif
    @else
    <p>Vous n'avez pas de réservation en cours</p>
    <a href="{{ route('booking.create') }}">Ajouter une réservation</a>
    @endif
</div>

@if(isset($finishedBookings))
<div>
    <p>Réservations passées :</p>
    @foreach($finishedBookings as $finishedBooking)
    <div style="border: solid;padding: 10px;margin: 10px;">
        <p>Du {{ $finishedBooking->start->format('Y-m-d') }} au {{ $finishedBooking->end->format('Y-m-d') }}</p>
        <p>Nombre de personnes : {{ $finishedBooking->nb_people }}</p>
    </div>
    @endforeach
</div>
@endif

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
        {{ __('Se déconnecter') }}
    </button>
</form>