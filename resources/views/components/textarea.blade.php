@props(['value' => null])
<x-bless-ui::wrapper {{ $attributes }} component="textarea" tag="textarea">{{ $value ?? $slot }}</x-bless-ui::wrapper>