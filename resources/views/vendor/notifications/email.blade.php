@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@if (isset($actionText))
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endif

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

<!-- Salutation -->
@if (! empty($salutation))
{{ $salutation }}
@else
Cordialement,<br>{{ config('app.name') }}
@endif

<!-- Subcopy -->
@if (isset($actionText))
@component('mail::subcopy')
Si vous rencontrez des difficultés en clickant sur le bouton "{{ $actionText }}", copiez et collez l'URL ci-dessous dans
votre navigateur : [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endif
@endcomponent
