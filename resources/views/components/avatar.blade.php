@props(['src' => null, 'text' => null, 'theme' => 'normal'])
@php
$config = config('bless-ui.components.avatar');
@endphp

<div {{ $attributes->class($config['base'])->class($config['themes'][$theme]) }}>
    @if($src)
        <img src="{{ $src }}" @class($config['image'] ?? null) >
    @else
        {{ str($text)->trim()->explode(' ')->map(fn ($t) => $t[0])->join(' ') }}
    @endif
</div>
