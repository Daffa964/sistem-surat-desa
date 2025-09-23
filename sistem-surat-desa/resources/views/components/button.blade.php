@props(['variant' => 'primary', 'size' => 'md', 'icon' => null])

@php
$baseClasses = "inline-flex items-center border font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200";

$variantClasses = [
    'primary' => 'border-transparent bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500 shadow-sm',
    'secondary' => 'border-gray-300 bg-white text-gray-700 hover:bg-gray-50 focus:ring-primary-500 shadow-sm',
    'success' => 'border-transparent bg-success-600 text-white hover:bg-success-700 focus:ring-success-500 shadow-sm',
    'danger' => 'border-transparent bg-danger-600 text-white hover:bg-danger-700 focus:ring-danger-500 shadow-sm',
    'warning' => 'border-transparent bg-warning-600 text-white hover:bg-warning-700 focus:ring-warning-500 shadow-sm',
    'outline' => 'border-gray-300 bg-transparent text-gray-700 hover:bg-gray-50 focus:ring-primary-500',
];

$sizeClasses = [
    'sm' => 'px-3 py-1.5 text-xs',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-6 py-3 text-base',
    'xl' => 'px-8 py-4 text-lg',
];

$iconSizeClasses = [
    'sm' => 'h-3 w-3',
    'md' => 'h-4 w-4',
    'lg' => 'h-5 w-5',
    'xl' => 'h-6 w-6',
];
@endphp

<button 
    {{ $attributes->merge(['class' => "{$baseClasses} {$variantClasses[$variant]} {$sizeClasses[$size]}"]) }}
    type="{{ $attributes->get('type', 'button') }}"
>
    @if($icon && !$attributes->get('iconPosition', 'left') === 'right')
        <svg xmlns="http://www.w3.org/2000/svg" class="{{ $iconSizeClasses[$size] }} mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            {!! $icon !!}
        </svg>
    @endif

    {{ $slot }}

    @if($icon && $attributes->get('iconPosition', 'left') === 'right')
        <svg xmlns="http://www.w3.org/2000/svg" class="{{ $iconSizeClasses[$size] }} ml-2 -mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            {!! $icon !!}
        </svg>
    @endif
</button>