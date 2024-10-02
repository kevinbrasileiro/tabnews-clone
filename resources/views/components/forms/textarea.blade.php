@props(['label', 'name', 'value' => old($name)])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-md bg-black border border-white/20 px-3 py-2 w-full',
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}>{{$value}}</textarea>
</x-forms.field>