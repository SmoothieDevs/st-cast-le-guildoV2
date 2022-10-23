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
                            <div class="link-number"><span>02</span></div><a class="st-cast"
                                href="/#section2">St-Cast</a>
                        </li>
                        <li>
                            <div class="link-number"><span>03</span></div><a class="appartement"
                                href="/#section4">Appartement</a>
                        </li>
                        <li>
                            <div class="link-number"><span>04</span></div><a class="contact"
                                href="/#section6">Contact</a>
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
                    <h3>Gérer les disponibilités de réservation</h3>
                </div>
            </div>
            <div class="wrapper-reservation">

                @if (session('success'))
                <p>{{ session('success') }}</p>
                @endif

                <p>Liste des plages de dates disponibles :</p>
                <ul>
                    @foreach ($availabilities as $availability)
                    <li>Du {{ $availability->from->format('d-m-Y') }} au {{ $availability->to->format('d-m-Y') }}</li>
                    @endforeach
                </ul>

                <p>Ajouter une nouvelle plage de dates disponibles :</p>
                <form action="{{ route('availability.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="from">Date de début</label>
                        <input type="date" name="from" id="from" required>
                        @error('from')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="to">Date de début</label>
                        <input type="date" name="to" id="to" required>
                        @error('to')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit">Valider</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>