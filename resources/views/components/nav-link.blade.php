@props(['active' => false])

<a 
    class="{{ $active ? 'border-b border-white' : 'hover:text-gray-400 transition-colors duration-150'}} text-white" 
    aria-current="{{ $active ? 'page' : 'false'}}"
    {{ $attributes }}
>{{ $slot }}</a>