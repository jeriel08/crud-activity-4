@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active d-block w-100 ps-3 pe-4 py-2 border-start border-4 border-primary text-start text-base font-medium text-primary bg-light focus:outline-none transition duration-150 ease-in-out'
            : 'nav-link d-block w-100 ps-3 pe-4 py-2 border-start border-4 border-transparent text-start text-base font-medium text-secondary hover:text-dark hover:bg-light hover:border-gray-300 focus:outline-none focus:text-dark focus:bg-light focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>