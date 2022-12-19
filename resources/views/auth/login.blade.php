<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Connexion | Cézembre Le-Guildo</title>
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
    <div class=" tl-wrapper">
      <div class="btn-menu">
        <div class="menu-text" data-menu="menu" data-close="close"></div>
        <div class="menu-bar">
          <span></span>
          <span></span>
          <span></span>
        </div>
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
    <main id="login">
        <div class="wrapper">
            <div class="form-wrapper">
                <div class="icon"></div>
                <h2>Connexion</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-wrapper">
                        <input type="email" name="email" id="email" placeholder="Adresse E-mail" />
                        @error('email')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-login">Connexion</button>
                    @if(session()->has('success'))
                    <div class="login-message">
                        <p>Nous venons d'envoyer un mail de connexion à cette adresse.</p>
                        <p>Veuillez cliquer sur le lien dans ce mail pour terminer votre connexion.</p>
                    </div>
                    @endif
                </form>
                @if (session('status') == 'email-not-verified')
                <div class="login-message">
                    <div>
                        Pour continuer votre réservation veuillez valider votre adresse email en cliquant sur le lien
                        que nous venons de vous envoyer par mail.
                    </div>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div>
                            <button type="submit" class="btn btn-logic">
                                Renvoyer un mail de vérification
                            </button>
                        </div>
                    </form>
                </div>
                @endif
                @if (session('status') == 'verification-link-sent')
                <div class="login-message">
                    Un nouveau lien de vérification a été envoyé à l'adresse utilisée lors de votre inscription.
                </div>
                @endif
            </div>
        </div>
    </main>
</body>

</html>