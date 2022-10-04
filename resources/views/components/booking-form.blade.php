<div class="menu-form">
    <form action="{{ route('booking.store') }}" method="post">
        @csrf
        <div class="wrapper-input date">
            <label for="arrive"></label>
            <input type="date" id="arrive" name="start" value="{{ old('start', $startDefault->format('Y-m-d')) }}" min="{{ $startMin->format('Y-m-d') }}" max="{{ $startMax->format('Y-m-d') }}" required>
            <input type="date" id="depart" name="end" value="{{ old('end', $endDefault->format('Y-m-d')) }}" min="{{ $endMin->format('Y-m-d') }}" max="{{ $endMax->format('Y-m-d') }}" required>
        </div>
        <div class="wrapper-input personnes">
            <div class="icon"></div>
            <label>Personnes</label>
            <div class="buttons">
                <div class="less"></div>
                <input type="text" id="personne" name="nb_people" value="{{ old('nb_people', '01') }}" required>
                <div class="plus"></div>
            </div>
        </div>
        @if(auth()->user() === null)
        <div class="wrapper-input email">
            <label></label>
            <input type="email" id="email" placeholder="Adresse E-mail" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="wrapper-input prenom">
            <label></label>
            <input type="text" id="prenom" placeholder="Prénom" name="firstname" value="{{ old('firstname') }}" required>
        </div>
        <div class="wrapper-input nom">
            <label></label>
            <input type="text" id="nom" placeholder="Nom" name="lastname" value="{{ old('lastname') }}" required>
        </div>
        @endif
        <div class="wrapper-input submit">
            <input type="submit" value="">
        </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>