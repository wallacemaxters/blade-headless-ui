@props(['href' => null])
<x-bless-ui::wrapper
    :tag="($href === null) ? 'div' : 'a'"
    component="card"
    {{ $attributes->merge(['href' => $href]) }}>
    {{ $content ?? $slot }}
</x-bless-ui::wrapper>
