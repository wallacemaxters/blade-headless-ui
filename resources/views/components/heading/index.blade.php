@props(['theme' => 'normal', 'tag' => 'h1'])
@php
$config = config('blade-headless-ui.components.heading.' . $tag);
@endphp
<{{$tag}} {{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null) }}>{{ $slot }}</{{$tag}}>
