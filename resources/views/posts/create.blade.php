<x-layout>
    <x-forms.form method="POST" action="/posts">
        <x-page-header>Create Post</x-page-header>
        <x-forms.input label="Title" name="title" />
        {{-- <x-forms.input :label="false" name="slug" type="hidden"/> --}}
        <x-forms.textarea rows="20" label="Content" name="body"/>
    
        <x-forms.button>Create Post</x-forms.button>
    </x-forms.form>
</x-layout>