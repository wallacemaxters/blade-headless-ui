@props(['theme' => 'normal'])
@php
$config = config('bless-ui.components.checkbox');
@endphp
<input 
	{{ $attributes->class($config['base'])->class($config['themes'][$theme] ?? null)->merge(['type' => 'checkbox']) }} 
/>

