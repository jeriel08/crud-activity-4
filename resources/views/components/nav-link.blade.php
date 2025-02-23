@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active fw-medium text-dark border-bottom border-primary'
            : 'nav-link text-secondary fw-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
