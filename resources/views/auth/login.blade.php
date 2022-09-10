<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'St-Cast-Le-Guildo-prod') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/app.scss'])
</head>

<body>
    @if(!session()->has('success'))
    <h1>Connexion</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <button>Se connecter</button>
    </form>
    @else
    <p>Nous venons d'envoyer un mail de connexion à cette adresse.</p>
    <p>Veuillez cliquer sur le lien dans ce mail pour terminer votre connexion.</p>
    @endif
</body>

</html>