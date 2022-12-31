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
            </a>
        </h1>
    </div>
    <div class="station">
        <span class="icon"></span>
        <time class="time"></time>
        <p class="lieu">Saint-Cast-le-Guildo</p>
        <p class="temperature"></p>
    </div>
    <div class="btn-logout-w">
        <p>{{ auth()->user()->firstname }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</p>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-logout">
                {{ __('Déconnexion') }}
            </button>
        </form>
    </div>
    <main id="user-dashboard">
        <div class="container">
            <div class="wrapper">
                @if(isset($booking))
                <div class="wrapper-top">
                    @if($booking->status->value === 'cancelled')
                    <div class="title">
                        <h3>Réservation annulée</h3>
                    </div>
                    @else
                    <div class="title">
                        <h3>Votre Réservation</h3>
                    </div>
                    <div class="wrapper-dashboard">
                        <div class="wrapper-l">
                            <div class="infos">
                                <figure>
                                    <img loading="lazy" src="{{ asset('images/st-cast/slider4.jpg')}}">
                                </figure>
                                <div>
                                    <h4>Appartement Duplex</h4>
                                    <p> 3 chambres - 4 lits - 1 salle de bain</p>
                                    <div>
                                        <div>
                                            <p>Matelots</p>
                                            <p>{{ $booking->nb_people }} Personnes</p>
                                        </div>
                                        <div>
                                            <p>Arrivée</p>
                                            <p>{{ $booking->start->isoFormat('Do MMM YYYY') }}</p>
                                        </div>
                                        <div>
                                            <p>Départ</p>
                                            <p>{{ $booking->end->isoFormat('Do MMM YYYY') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="wrapper-r">
                            <div class="details">
                                <div>
                                    <p>Résidence</p>
                                    <p>Résidence Cézembre</p>
                                </div>
                                <div>
                                    <p>Appartement</p>
                                    <p>Numéro 102</p>
                                </div>
                                <div>
                                    <p>Ville</p>
                                    <p>St-Cast-Le-Guildo</p>
                                </div>
                                <div>
                                    <p>Adresse</p>
                                    <p>19 Rue du Port Jaquet</p>
                                </div>
                            </div>
                            <div class="action">
                                <form action="{{ route('booking.edit', ['booking' => $booking->id]) }}">
                                    <button class="edit" type="submit">{{ __('Éditer la réservation') }}</button>
                                </form>
                                <form method="POST" action="{{ route('booking.cancel', ['booking' => $booking->id]) }}">
                                    @csrf
                                    <button type="submit" class="cancel">
                                        {{ __('Annuler la réservation') }}
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="wrapper-left">
                    <div class="title">
                        <h5>Où se situe le logement</h5>
                    </div>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d479.72883080998275!2d-2.2547156499804686!3d48.63854274171605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480e79de6d76e7fd%3A0xee50b6d1ad39f36f!2s19%20Rue%20du%20Port%20Jaquet%2C%2022380%20Saint-Cast-le-Guildo!5e0!3m2!1sfr!2sfr!4v1671474460348!5m2!1sfr!2sfr" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="wrapper-right">
                    <div class="title">
                        <h5>Contacter l'hôte</h5>
                    </div>
                    <div>
                        <p>Téléphone</p>
                        <p>+33 6 60 73 98 64</p>
                    </div>
                    <div>
                        <p>Email</p>
                        <p>patrick.stephan@lasposte.net</p>
                    </div>
                </div>
                @endif
                @else
                <p>Vous n'avez pas de réservation en cours</p>
                <a href="{{ route('booking.create') }}">Ajouter une réservation</a>
                @endif
                @if(isset($finishedBookings))
                <div class="wrapper-history">
                    <div class="title">
                        <h4>Historique de mes réservations</h4>
                    </div>
                    <div class="history">
                        @foreach($finishedBookings as $finishedBooking)
                        <div class="reservation">
                            <p>Du {{ $finishedBooking->start->isoFormat('Do MMM YYYY') }} au {{ $finishedBooking->end->isoFormat('Do MMM YYYY') }}</p>
                            <p>Nombre de personnes : {{ $finishedBooking->nb_people }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>
</body>

</html>