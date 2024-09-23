<x-layout>
    <x-forms.form method="POST" action="/posts">
        <x-page-header>Create Post</x-page-header>
        <x-forms.input label="Title" name="title" />
        <x-forms.textarea label="Content" name="body"/>
    
        <x-forms.button>Create Post</x-forms.button>
    </x-forms.form>
</x-layout>