<p>Bienvenue utilisateur authentifié</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
        {{ __('Se déconnecter') }}
    </button>
</form>