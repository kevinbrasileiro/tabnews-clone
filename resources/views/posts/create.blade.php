<x-layout>
    <x-forms.form method="POST" action="/posts">
        <h1 class="font-bold text-4xl mb-8">Create Post</h1>
        <x-forms.input label="Title" name="title" />
        <x-forms.textarea label="Content" name="body"/>
    
        <x-forms.button>Create Post</x-forms.button>
    </x-forms.form>
</x-layout>