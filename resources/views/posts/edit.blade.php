<x-layout>
    <x-forms.form method="POST" action="/{{$post->user->username}}/{{$post->slug}}">
        @method('PATCH')
        <x-page-header>Edit Post</x-page-header>
        <x-forms.input label="Title" name="title" value="{{$post->title}}"/>
        <x-forms.textarea-edit rows="20" label="Content" name="body" :editContent="$post->body"/>
        <div class="flex justify-between items-center">
            <x-forms.button>Edit Post</x-forms.button>
            <button form="delete-post" title="Delete Post">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#D16D6A"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
            </button>
        </div>
    </x-forms.form>

    <form method="POST" action="/{{$post->user->username}}/{{$post->slug}}" id="delete-post" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>