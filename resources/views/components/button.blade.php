@props(['href' => null, 'theme' => 'default'])
@php
$tag = $href === null ? 'button' : 'a';
$config = config('blade-headless-ui.ui.button');
@endphp
<{{$tag}} {{ $attributes->class($config['base'])->class(['href' => $href])->class($config['themes'][$theme]) }}>{{ $slot }}</{{$tag}}>
