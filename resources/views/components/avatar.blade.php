@props(['src' => null, 'text' => null])
<x-bless-ui::wrapper component='avatar' {{ $attributes }}>
    @if($src)
        <img src="{{ $src }}" >
    @else
        {{ str($text)->trim()->explode(' ')->map(fn ($t) => $t[0])->join(' ') }}
    @endif
</x-bless-ui::wrapper>
