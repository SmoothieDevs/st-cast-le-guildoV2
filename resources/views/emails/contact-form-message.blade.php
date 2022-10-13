@component('mail::message')
Message de {{ $name }} ({{ $email }}) :

@component('mail::panel')
{{ $message }}
@endcomponent
@endcomponent