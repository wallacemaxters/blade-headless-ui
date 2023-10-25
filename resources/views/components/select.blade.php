<x-bless-ui::wrapper tag="div" component="select" >
    <select {{ $attributes }}>
        {{ $slot }}
    </select>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
</x-bless-ui::wrapper>
