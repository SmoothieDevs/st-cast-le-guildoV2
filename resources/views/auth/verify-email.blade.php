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
    <div>
        {{ __('Pour continuer votre réservation veuillez valider votre adresse mail en cliquant sur le lien que nous venons de vous envoyer.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div>
        {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse utilisée lors de votre inscription') }}
    </div>
    @endif

    <div>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <button type="submit">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</body>

</html>