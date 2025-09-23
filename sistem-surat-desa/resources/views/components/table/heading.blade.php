@props(['align' => 'left'])

@php
$alignmentClasses = [
    'left' => 'text-left',
    'center' => 'text-center',
    'right' => 'text-right',
];
@endphp

<th scope="col" {{ $attributes->merge(['class' => "px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider {$alignmentClasses[$align]}"]) }}>
    {{ $slot }}
</th>