@props(['disabled' => false, 'checked' => false])

<input 
    type="radio" 
    {{ $disabled ? 'disabled' : '' }} 
    {{ $checked ? 'checked' : '' }}
    {!! $attributes->merge(['class' => 'border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500']) !!}
>