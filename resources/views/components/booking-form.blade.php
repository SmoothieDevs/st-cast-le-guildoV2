<div class="menu-form">
    <form action="{{ route('booking.store') }}" method="post">
        @csrf
        <div class="first-step">
            <div class="fs-left">
                <div class="wrapper-input date">
                    <div class="icon"></div>
                    <input style="pointer-events: none;" type="text" id="arrive" name="start" value="" placeholder="Arrivée" required>
                    <div class="arrow"></div>
                    <input style="pointer-events: none;" type="text" id="depart" name="end" value="" placeholder="Départ" required>
                </div>
            </div>
            <div class="fs-right">
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
                <div class="wrapper-input next">
                    <button type="button"></button>
                </div>
                @else
                <div class="wrapper-input submit">
                    <button type="submit"></button>
                </div>
                @endif
            </div>
        </div>
        @if(auth()->user() === null)
        <div class="second-step">
            <div class="ss-left">
                <div class="wrapper-input back">
                    <button type="button"></button>
                </div>
                <div class="wrapper-input email">
                    <div class="icon"></div>
                    <input type="email" id="email" placeholder="Adresse E-mail" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="ss-center">
                <div class="wrapper-input prenom">
                    <div class="icon"></div>
                    <input type="text" id="prenom" placeholder="Prénom" name="firstname" value="{{ old('firstname') }}" required>
                </div>
            </div>
            <div class="ss-right">
                <div class="wrapper-input nom">
                    <div class="icon"></div>
                    <input type="text" id="nom" placeholder="Nom" name="lastname" value="{{ old('lastname') }}" required>
                </div>
                <div class="wrapper-input submit">
                    <button type="submit"></button>
                </div>
            </div>
        </div>
        @endif
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