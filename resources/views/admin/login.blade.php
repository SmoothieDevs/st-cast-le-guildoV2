<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Cézembre Le-Guildo</title>
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
    <div class="btn-menu">
        <div class="menu-text" data-menu="menu" data-close="close"></div>
        <div class="menu-bar">
            <span></span>
            <span></span>
            <span></span>
        </div>
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
    <main id="login">
        <div class="wrapper">
            <div class="form-wrapper">
                <div class="icon"></div>
                <h2>Connexion</h2>
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="input-wrapper">
                        <input type="email" name="email" id="email" placeholder="Adresse E-mail" />
                        @error('email')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="password" placeholder="Mot de passe" />
                        @error('password')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-login">Connexion</button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>