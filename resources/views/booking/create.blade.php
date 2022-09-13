@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('booking.store') }}" method="post">
    @csrf
    <fieldset>
        <legend>Votre réservation</legend>
        <div>
            <label for="start">Date de début</label>
            <input type="date" name="start" id="start" value="2022-10-08" required>
            @error('start')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="end">Date de fin</label>
            <input type="date" name="end" id="end" value="2022-10-15" required>
            @error('end')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nb_people">Nombre de personnes</label>
            <input type="number" name="nb_people" id="nb_people" value="2" required>
            @error('nb_people')
            <p>{{ $message }}</p>
            @enderror
        </div>
    </fieldset>

    @if(auth()->user() === null)
    <fieldset>
        <legend>Votre compte</legend>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" value="Jean" required autocomplete="given-name" />
        @error('firstname')
        <p>{{ $message }}</p>
        @enderror
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname" value="Pizza" required autocomplete="family-name" />
        @error('lastname')
        <p>{{ $message }}</p>
        @enderror
        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" value="jean@pizza.fr" required autocomplete="email" />
        @error('email')
        <p>{{ $message }}</p>
        @enderror
    </fieldset>
    @endif
    <button type="submit">Réserver</button>
</form>