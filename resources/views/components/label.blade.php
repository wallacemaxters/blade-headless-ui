@props(['theme' => 'normal'])
@php
$config = config('bless-ui.components.label');
@endphp
<label {{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null) }}>{{ $slot }}</label>
