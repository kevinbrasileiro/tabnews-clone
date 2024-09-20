@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-md bg-black border border-white/20 px-3 py-2 w-full',
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea rows="20" {{ $attributes($defaults) }}>{{old($name)}}</textarea>
</x-forms.field>