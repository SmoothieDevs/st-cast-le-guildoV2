<form action="{{ route('booking.update', ['booking' => $booking->id]) }}" method="post">
    @csrf
    @method('PATCH')
    <div>
        <label for="start">Date de début</label>
        <input type="date" name="start" id="start" value="{{ $booking->start->format('Y-m-d') }}">
        @error('start')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="end">Date de fin</label>
        <input type="date" name="end" id="end" value="{{ $booking->end->format('Y-m-d') }}">
        @error('end')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="nb_people">Nombre de personnes</label>
        <input type="number" name="nb_people" id="nb_people" value="{{ $booking->nb_people }}">
        @error('nb_people')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <a href="{{ url()->previous() }}">Annuler</a>
    <button type="submit">Éditer</button>
</form>