<x-layout>
    <x-forms.form method="POST" action="/{{$post->user->username}}/{{$post->slug}}">
        @method('PATCH')
        <x-page-header>Edit Post</x-page-header>
        <x-forms.input label="Title" name="title" value="{{$post->title}}"/>
        <x-forms.textarea-edit rows="20" label="Content" name="body" :editContent="$post->body"/>
        <div class="flex justify-between items-center">
            <x-forms.button>Edit Post</x-forms.button>
        </div>
    </x-forms.form>
</x-layout>