@props(['type' => 'info', 'dismissible' => true])

@php
$classes = [
    'info' => 'bg-primary-50 text-primary-800 border-primary-200',
    'success' => 'bg-success-50 text-success-800 border-success-200',
    'warning' => 'bg-warning-50 text-warning-800 border-warning-200',
    'error' => 'bg-danger-50 text-danger-800 border-danger-200',
];

$icons = [
    'info' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
    'success' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
    'warning' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
    'error' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
];

$iconColors = [
    'info' => 'text-primary-400',
    'success' => 'text-success-400',
    'warning' => 'text-warning-400',
    'error' => 'text-danger-400',
];
@endphp

<div {{ $attributes->merge(['class' => "rounded-lg p-4 border {$classes[$type]}"]) }} role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 {{ $iconColors[$type] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                {!! $icons[$type] !!}
            </svg>
        </div>
        <div class="ml-3 flex-1">
            {{ $slot }}
        </div>
        @if($dismissible)
            <div class="ml-4 flex-shrink-0">
                <button type="button" class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $iconColors[$type] }} hover:opacity-75">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
</div>