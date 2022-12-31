<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | Cézembre Le-Guildo</title>
    <!-- Scripts -->
    @vite(['resources/css/loader.css','resources/js/loader.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/app.scss'])
</head>

<body class="black fixed">
    <div class="loader">
        <div class="wrapper">
            <div class="icon"></div>
            <p>Chargement...</p>
        </div>
    </div>
    <div class="main-logo">
        <h1>
            <a href="/">
                <div data-splitting class="sup">Cézembre</div>
                <div data-splitting class="sub">Le Guildo</div>
        </h1>
        </a>
    </div>
    <div class="station">
        <span class="icon"></span>
        <time class="time"></time>
        <p class="lieu">Saint-Cast-le-Guildo</p>
        <p class="temperature"></p>

    </div>
    <div class="btn-logout-w">
        <p>Admin&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</p>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-logout">
                {{ __('Déconnexion') }}
            </button>
        </form>
    </div>
    <main id="admin-dashboard">
        <div class="container">
            <div class="wrapper-top">
                <div class="title">
                    <h3>Tableau de bord</h3>
                </div>
                <div class="wrapper-dashboard">
                    <div class="wrapper-numbers">
                        <div class="key-number">
                            <p class="number">{{ $bookings->where('status',
                                \App\Enums\BookingStatus::Validated)->count() }}</p>
                            <p class="key">Réservations</p>
                        </div>
                        <div class="key-number">
                            <p class="number">{{ $nbAvailableDays }}</p>
                            <p class="key">Jours disponibles</p>
                        </div>
                        <div class="key-number">
                            <p class="number">{{ $bookings->where('status',
                                \App\Enums\BookingStatus::PendingConfirmation)->count() }}</p>
                            <p class="key">Réservations en attentes</p>
                        </div>
                        <div class="key-number">
                            <p class="number">3758</p>
                            <p class="key">Euros reçu</p>
                        </div>
                    </div>
                    <div class="wrapper-calendar">
                        <form id="dateManagerForm" action="{{ route('availability.store') }}" method="post">
                            @csrf
                            <input id="datepicker" />
                            <input type="hidden" name="from" id="from" required />
                            <input type="hidden" name="to" id="to" required />
                            <input type="hidden" name="type" id="type" required />
                            <div class="calendar-legend">
                                <ul>
                                    <li class="reserved">Jours réservés</li>
                                    <li class="locked">Jours bloqués</li>
                                </ul>
                            </div>
                            <button type="button" id="lock">Bloquer les dates</button>
                            <button type="button" id="unlock">Débloquer les dates</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="wrapper-reservation">
                <div class="title">
                    <h4>Réservations en cours</h4>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Arrivée</th>
                            <th scope="col">Départ</th>
                            <th scope="col">Personnes</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>

                            <td> <a href="mailto:{{ $booking->user->email }}">{{ $booking->user->email }}</a></td>
                            <td>{{ $booking->start->isoFormat('Do MMM YYYY') }}</td>
                            <td>{{ $booking->end->isoFormat('Do MMM YYYY') }}</td>
                            <td>{{ $booking->nb_people }}</td>
                            <td class="{{ str_replace('-', ' ', strtolower($booking->status->label())) }}">{{
                                $booking->status->label() }}</td>
                            <td>
                                @if(isset($booking->actions))
                                @foreach ($booking->actions as $value => $action)
                                <form method="POST" action="{{ $action }}">
                                    @csrf
                                    <button type="submit">
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
            </div>
        </div>
    </main>
</body>

</html>
