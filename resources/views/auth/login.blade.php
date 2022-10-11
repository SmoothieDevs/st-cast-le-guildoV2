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
                <span class="sup">Cézembre</span>
                <span class="sub">Le Guildo</span>
        </h1>
        </a>
    </div>
    <div class="station">
        <span class="icon"></span>
        <time class="time"></time>
        <p class="lieu">Saint-Cast-le-Guildo</p>
        <p class="temperature"></p>
    </div>
    <button class="btn-menu">
        menu
    </button>
    @if(!session()->has('success'))
    <main id="login">
        <div class="wrapper">
            <div class="form-wrapper">
            <div class="icon"></div>
            <h2>Connexion</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-wrapper">
                    <input type="email" name="email" id="email" placeholder="Adresse E-mail"/>
                    @error('email')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-login">Connexion</button>
            </form>
            @else
            <p>Nous venons d'envoyer un mail de connexion à cette adresse.</p>
            <p>Veuillez cliquer sur le lien dans ce mail pour terminer votre connexion.</p>
            @endif
            </div>
        </div>
    </main>
</body>

</html>