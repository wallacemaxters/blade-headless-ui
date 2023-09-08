@props(['href' => null, 'theme' => 'normal'])
@php
$tag = $href === null ? 'button' : 'a';
$config = config('bless-ui.components.button');
@endphp
<{{$tag}} {{ $attributes->class($config['base'])->merge(['href' => $href])->class($config['themes'][$theme]) }}>{{ $slot }}</{{$tag}}>
