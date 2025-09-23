@props(['id', 'title' => '', 'maxWidth' => '2xl'])

@php
$maxWidthClasses = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
    '3xl' => 'sm:max-w-3xl',
];
@endphp

<div 
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-show="show"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0"
    style="display: none;"
>
    <div 
        x-show="show" 
        class="fixed inset-0 transform transition-all" 
        x-on:click="show = false" 
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div 
        x-show="show" 
        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidthClasses[$maxWidth] }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        @if($title)
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
            </div>
        @endif

        <div class="bg-white px-6 py-4">
            {{ $slot }}
        </div>

        @if(isset($footer))
            <div class="px-6 py-4 bg-gray-50 border-t">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>