@props(['value'])

<label style="margin-right: {{$value=='Email' ? '44': '15' }}px" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }} :
</label>
