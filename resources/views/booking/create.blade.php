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
    <div>
        <label for="start">Date de début</label>
        <input type="date" name="start" id="start" value="2022-10-08">
        @error('start')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="end">Date de fin</label>
        <input type="date" name="end" id="end" value="2022-10-15">
        @error('end')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="nb_people">Nombre de personnes</label>
        <input type="number" name="nb_people" id="nb_people" value="2">
        @error('nb_people')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <button type="submit">Réserver</button>
</form>