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
    <nav>
        <div class="nav-bg"></div>
        <div class="nav-container">
            <div class="nav-wrapper">
                <div class="nav-wrapper-l">
                    <ul>
                        <li>
                            <div class="link-number"><span>01</span></div><a class="accueil" href="/">Accueil</a>
                        </li>
                        <li>
                            <div class="link-number"><span>02</span></div><a class="st-cast" href="/#section2">St-Cast</a>
                        </li>
                        <li>
                            <div class="link-number"><span>03</span></div><a class="appartement" href="/#section4">Appartement</a>
                        </li>
                        <li>
                            <div class="link-number"><span>04</span></div><a class="contact" href="/#section6">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-wrapper-r"></div>
            </div>

        </div>
    </nav>
    <main id="admin-dashboard">
        <div class="container-s">
            <div class="wrapper-dashboard">
                <div class="title">
                    <h3>Tableau de bord</h3>
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
            </div>
        </div>
    </main>
</body>

</html>