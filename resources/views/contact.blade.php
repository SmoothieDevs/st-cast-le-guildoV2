<div>
    <h2>Nous envoyer un petit message tout sympa tout rigolo</h2>
    @if(Session::has('success'))
    <div>
        {{ Session::get('success') }}
    </div>
    @endif
    <form method="POST" action="{{ route('contact.create') }}">
        @csrf
        @honeypot
        <div>
            <label for="name">Votre nom: </label>
            <input type="text" id="name" placeholder="Nom Prénom" name="name" required>
            @error('name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="email">Adresse mail de contact: </label>
            <input type="email" id="email" placeholder="Email" name="email" required>
            @error('email')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="message">Votre message: </label>
            <textarea type="text" id="message" placeholder="Enter your message here" name="message"
                required> </textarea>
            @error('message')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <button type="submit">Envoyer</button>
        </div>

    </form>
</div>