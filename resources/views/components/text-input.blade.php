@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-[#cd84d5] focus:ring-[#cd84d5] rounded-md shadow-sm',
]) !!}>
