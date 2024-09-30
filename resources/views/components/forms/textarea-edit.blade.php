@props(['label', 'name', 'editContent'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-md bg-black border border-white/20 px-3 py-2 w-full',
        'editContent' => $editContent
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}>{{$editContent}}</textarea>
</x-forms.field>