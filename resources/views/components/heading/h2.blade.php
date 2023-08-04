@props(['theme' => 'normal'])
@php
$config = config('blade-headless-ui.components.heading.h2');
@endphp
<h2 {{ $attributes->class($config['base'])->class($config['themes'][$theme]) }}>{{ $slot }}</h2>
