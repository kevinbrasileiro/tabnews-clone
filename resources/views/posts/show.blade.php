<x-layout>
    <div class="flex space-x-3 mb-6">
        <div class="flex flex-col items-center space-y-3">
            <div class="hover:bg-gray-700 rounded-md cursor-pointer transition-colors duration-300 {{$userHasLiked == '1' ? 'bg-gray-700' : ''}}" title="I liked this post">
                <form method="POST" action="{{url()->current()}}" class="h-6">
                    @csrf
                    <input type="hidden" name="post" value="{{$post->id}}">
                    <input type="hidden" name="type" value="1">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#6b7280"><path d="m280-400 200-200 200 200H280Z"/></svg>
                    </button>
                </form>
            </div>
            <div class="text-sm text-blue-500">
                {{ $likes }}
            </div>
            <div class="hover:bg-gray-700 rounded-md cursor-pointer transition-colors duration-300 {{$userHasLiked == '-1' ? 'bg-gray-700' : ''}}" title="I disliked this post">
                <form method="POST" action="{{url()->current()}}" class="h-6">
                    @csrf
                    <input type="hidden" name="post" value="{{$post->id}}">
                    <input type="hidden" name="type" value="-1">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#6b7280"><path d="M480-360 280-560h400L480-360Z"/></svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="space-y-1 w-full">
            <div class="flex justify-between items-center">
                <div class="flex space-x-2 items-center">
                    <a href="/users/{{ $post->user->username }}" class="text-sm text-blue-500 bg-blue-900/20 rounded-lg px-1 py-0.5 hover:underline ">{{$post->user->username}}</a>
                    <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
                <div class="flex items-center gap-x-4">
                    @can('update', $post)
                        <a href="{{url()->current()}}/edit" title="Edit Post">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                        </a>
                    @endcan
                    @if ($post->user == Auth::user())
                        @cannot('update', $post)
                            <div class="cursor-not-allowed" title="You cannot edit posts older than one hour">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                            </div>
                        @endcannot
                    @endif
                    @can('delete', $post)
                        <button form="delete-post" title="Delete Post">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#D16D6A"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </button>
                    @endcan
                </div>
            </div>
            <div>
                <x-page-header>{{ $post->title }}</x-page-header>
                <div class="max-w-4xl break-words">
                    {!! nl2br(htmlspecialchars($post->body, ENT_QUOTES)) !!}
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/{{$post->user->username}}/{{$post->slug}}" id="delete-post" class="hidden">
        @csrf
        @method('DELETE')
    </form>
    
    <div class="space-y-6">
        <div class="border border-gray-700 rounded-lg px-6 py-4">
            <x-forms.form method="POST" action="/comments">
                <x-forms.input :label="false" name="post" type="hidden" value="{{$post->id}}"/>
                <x-forms.textarea :label="false" name="body"/>
            
                <x-forms.button>Reply</x-forms.button>
            </x-forms.form>
        </div>

        @foreach ($comments as $comment)
            <x-comment :comment="$comment" :post="$post"/>
        @endforeach

    </div>
</x-layout>