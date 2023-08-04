@props(['theme' => 'normal'])
@php
$config = config('blade-headless-ui.components.heading.h1');
@endphp
<h1 {{ $attributes->class($config['base'])->class($config['themes'][$theme]) }}>{{ $slot }}</h1>
