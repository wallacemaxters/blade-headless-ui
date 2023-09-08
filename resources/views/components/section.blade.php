@props(['theme' => 'normal'])
@php
$config = config('bless-ui.components.section');
@endphp
<section {{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null) }}>{{ $slot }}</section>
