@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'dropdown-menu'])

@php
$alignmentClasses = match ($align) {
    'left' => 'dropdown-menu-start',
    'top' => 'dropup',
    default => 'dropdown-menu-end',
};

$widthClass = match ($width) {
    '48' => 'w-100',
    default => $width,
};
@endphp

<div class="dropdown">
    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $trigger }}
    </div>

    <div class="dropdown-menu {{ $alignmentClasses }} {{ $widthClass }} {{ $contentClasses }}">
        {{ $content }}
    </div>
</div>
