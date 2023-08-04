@props(['theme' => 'normal'])
@php
$config = config('blade-headless-ui.components.section');
@endphp
<section {{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null) }}>{{ $slot }}</section>
