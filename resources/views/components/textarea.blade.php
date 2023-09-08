@props(['theme' => 'normal', 'value' => null])
@php
$config = config('bless-ui.components.textarea');
@endphp
<textarea {{ $attributes->class($config['base'])->class($config['themes'][$theme]) }}>{{ $value ?? $slot }}</textarea>
