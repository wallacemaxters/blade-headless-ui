@props(['theme' => 'base', 'tag' => 'h1'])
@php
$config = config('bless-ui.components.heading.' . $tag);
@endphp
<{{$tag}} {{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null) }}>{{ $slot }}</{{$tag}}>
