@props(['title', 'value', 'description' => null, 'icon' => null, 'color' => 'primary'])

@php
$colorClasses = [
    'primary' => 'bg-primary-100 text-primary-600',
    'secondary' => 'bg-secondary-100 text-secondary-600',
    'success' => 'bg-success-100 text-success-600',
    'warning' => 'bg-warning-100 text-warning-600',
    'danger' => 'bg-danger-100 text-danger-600',
];
@endphp

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300']) }}>
    <div class="p-6">
        <div class="flex items-center">
            @if($icon)
                <div class="flex-shrink-0 p-3 rounded-lg {{ $colorClasses[$color] }}">
                    {{ $icon }}
                </div>
            @endif
            <div class="{{ $icon ? 'ml-4' : '' }}">
                <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $value }}</p>
                @if($description)
                    <p class="text-sm text-gray-600 mt-1">{{ $description }}</p>
                @endif
            </div>
        </div>
    </div>
</div>