@props(['label' => null, 'required' => false])

<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if($label)
        <x-input-label for="{{ $attributes->get('id') }}" :value="__($label)" :required="$required" />
    @endif
    
    <div class="mt-1">
        {{ $slot }}
    </div>
    
    @if($required && $attributes->get('name'))
        <x-input-error :messages="$errors->get($attributes->get('name'))" class="mt-2" />
    @endif
</div>