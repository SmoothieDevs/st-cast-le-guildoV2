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
    <h1>Inscription</h1>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div>
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname" required autocomplete="given-name"/>
            @error('firstname')
            <p>{{ $message }}</p>
            @enderror
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname" required autocomplete="family-name"/>
            @error('lastname')
            <p>{{ $message }}</p>
            @enderror
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autocomplete="email" />
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <p>Tous les champs sont requis</p>
        <button>S'inscrire</button>
    </form>
</body>

</html>