<p>Bienvenue utilisateur authentifié</p>

@if(isset($booking))
<p>Vous avez une réservation en cours</p>
@else
<p>Vous n'avez pas de réservation en cours</p>
@endif

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
        {{ __('Se déconnecter') }}
    </button>
</form>