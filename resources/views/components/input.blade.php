@props(['theme' => 'normal'])
@php
$config = config('bless-ui.components.input');
@endphp
<input {{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null)->merge(['type' => 'text']) }} />
