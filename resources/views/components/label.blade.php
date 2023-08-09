@props(['theme' => 'normal'])
@php
$config = config('blade-headless-ui.components.label');
@endphp
<label {{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null) }}>{{ $slot }}</label>
