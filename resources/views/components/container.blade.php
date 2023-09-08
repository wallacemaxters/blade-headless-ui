@props(['theme' => 'normal'])
@php
$config = config('bless-ui.components.container');
@endphp
<div {{ $attributes->class($config['base'])->class($config['themes'][$theme]) }}>{{ $slot }}</div>
