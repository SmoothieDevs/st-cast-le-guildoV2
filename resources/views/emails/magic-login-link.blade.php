@component('mail::message')
  Bonjour, pour terminer votre connexion veuillez cliquer sur le lien ci-dessous.
  @component('mail::button', ['url' => $url])
    Se connecter
  @endcomponent
@endcomponent