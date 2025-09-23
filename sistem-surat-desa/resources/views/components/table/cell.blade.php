@props(['align' => 'left'])

@php
$alignmentClasses = [
    'left' => 'text-left',
    'center' => 'text-center',
    'right' => 'text-right',
];
@endphp

<td {{ $attributes->merge(['class' => "px-6 py-4 whitespace-nowrap text-sm text-gray-500 {$alignmentClasses[$align]}"]) }}>
    {{ $slot }}
</td>