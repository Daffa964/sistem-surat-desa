@props(['title' => null, 'description' => null])

<div {{ $attributes->merge(['class' => 'mt-5 md:mt-0 md:col-span-2']) }}>
    <x-card>
        @if($title || $description)
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                @if($title)
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
                @endif
                
                @if($description)
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $description }}</p>
                @endif
            </div>
        @endif
        
        <div class="px-4 py-5 sm:p-6">
            {{ $slot }}
        </div>
    </x-card>
</div>