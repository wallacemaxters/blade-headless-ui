@props(['href' => null])
<x-bless-ui::wrapper
    {{ $attributes->merge(compact('href')) }}
    :tag="$href === null ? 'button' : 'a'"
    component="button">{{ $slot }}</x-bless-ui::wrapper>
