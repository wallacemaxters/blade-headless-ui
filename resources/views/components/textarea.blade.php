@props(['theme' => 'default', 'value' => null])
@php
$config = config('blade-headless-ui.ui.textarea');
@endphp
<textarea {{ $attributes->class($config['base'])->class($config['themes'][$theme]) }}>{{ $value ?? $slot }}</textarea>
