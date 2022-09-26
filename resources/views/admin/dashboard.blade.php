<div style="margin-bottom: 15px;">
    <p style="display: inline;">Admin dashboard</p>

    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf

        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
            {{ __('Se déconnecter') }}
        </button>
    </form>
</div>

<table border="1" style="text-align: center;">
    <caption>Réservations en cours</caption>
    <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Date de début</th>
            <th scope="col">Date de fin</th>
            <th scope="col">Nombre de personnes</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr>
            <td> <a href="mailto:{{ $booking->user->email }}">{{ $booking->user->email }}</a></td>
            <td>{{ $booking->start->format('d/m/Y') }}</td>
            <td>{{ $booking->end->format('d/m/Y') }}</td>
            <td>{{ $booking->nb_people }}</td>
            <td>{{ $booking->status->label() }}</td>
            <td>
                @if(isset($booking->actions))
                @foreach ($booking->actions as $value => $action)
                <form method="POST" action="{{ $action }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __($value) }}
                    </button>
                </form>
                @endforeach
                @else
                <p>---</p>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>