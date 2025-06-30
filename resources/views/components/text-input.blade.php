@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-transparent focus:ring-2 focus:ring-blue-300 rounded-md shadow-sm']) }}>
