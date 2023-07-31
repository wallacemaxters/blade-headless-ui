@props(['src' => null, 'text' => null])
<div {{ $attributes->class(config('blade-headless-ui.ui.avatar.base')) }}>
    @if($src)
    <img src="{{ $src }}" @class(config('blade-headless-ui.ui.avatar.image')) >
    @else
        {{ str($text)->trim()->explode(' ')->map(fn ($t) => $t[0])->join(' ') }}
    @endif
</div>
