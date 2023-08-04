@props(['theme' => 'normal'])
@php
$config = config('blade-headless-ui.components.input');
@endphp
<input {{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null)->merge(['type' => 'text']) }} />
