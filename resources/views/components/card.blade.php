@props(['href' => null, 'theme' => 'normal'])
@php
$config = config('bless-ui.components.card');
$tag = ($href === null) ? 'div' : 'a';

@endphp
<{{ $tag }}
    {{ $attributes->merge(['href' => $href])
        ->class($config['base'])
        ->class($config['themes'][$theme]) }}>

    {{ $content ?? $slot }}
</{{ $tag }}>
