@props(['active'])
{{-- <a  class="bg-blue text-pink p-2 text-xl rounded hover:no-underline hover:bg-pink hover:text-blue
transition duration-450 ease-in-out ">
{{ $text }}
</a> --}}

@php
$classes = ($active ?? false)
            ? 'bg-pink text-blue p-2 text-xl rounded  transition duration-450 ease-in-out'
            : 'bg-blue text-pink p-2 text-xl rounded  transition duration-450 ease-in-out ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
