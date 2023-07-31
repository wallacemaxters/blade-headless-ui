@props(['theme' => 'default'])
@php
$config = config('blade-headless-ui.ui.input');
@endphp
<input {{ $attributes->class($config['base'])->class($config['themes'][$theme])->merge(['type' => 'text']) }} />
