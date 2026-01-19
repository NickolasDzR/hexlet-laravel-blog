@php

    $currentButtonText = $buttonText ?? 'Создать';
    $currentButtonClass = $buttonClass ?? '';

@endphp

{{  html()->label('Имя', 'name') }}
{{  html()->input('text', 'name') }}
@error('name')
    <p class="alert alert-danger">{{ $message  }}</p>
@enderror

{{  html()->label('Содержание', 'body') }}
{{  html()->textarea('body') }}
@error('body')
    <p class="alert alert-danger">{{ $message  }}</p>
@enderror

{{ html()->submit($currentButtonText)->class($currentButtonClass) }}
