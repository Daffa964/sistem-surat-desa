@props(['title' => null, 'subtitle' => null, 'icon' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300']) }}>
    @if($title || $icon)
        <div class="px-6 py-4 border-b border-gray-100">
            <div class="flex items-center">
                @if($icon)
                    <div class="flex-shrink-0">
                        {{ $icon }}
                    </div>
                @endif
                <div class="{{ $icon ? 'ml-4' : '' }}">
                    @if($title)
                        <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
                    @endif
                    @if($subtitle)
                        <p class="text-sm text-gray-600 mt-1">{{ $subtitle }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
            {{ $footer }}
        </div>
    @endif
</div>