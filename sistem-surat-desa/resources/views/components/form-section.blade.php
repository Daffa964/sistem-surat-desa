@props(['title' => '', 'description' => ''])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    @if($title || $description)
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                @if($title)
                    <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
                @endif

                @if($description)
                    <p class="mt-1 text-sm text-gray-600">
                        {{ $description }}
                    </p>
                @endif
            </div>
        </div>
    @endif

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>