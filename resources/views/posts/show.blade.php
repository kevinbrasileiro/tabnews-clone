<x-layout>
    <div class="flex space-x-3 mb-6">
        <div class="flex flex-col items-center space-y-3">
            <div class="hover:bg-gray-700 rounded-md cursor-pointer transition-colors duration-300" title="I liked this post">
                {{-- TODO: --}}
                <form method="POST" action="/" class="h-6">
                    @csrf
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#6b7280"><path d="m280-400 200-200 200 200H280Z"/></svg>
                    </button>
                </form>
            </div>
            <div class="text-sm text-blue-500">
                {{ $likes }}
            </div>
            <div class="hover:bg-gray-700 rounded-md cursor-pointer transition-colors duration-300" title="I disliked this post">
                {{-- TODO: --}}
                <form method="POST" action="/" class="h-6">
                    @csrf
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#6b7280"><path d="M480-360 280-560h400L480-360Z"/></svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="space-y-1">
            <div class="flex space-x-2 items-center">
                <a href="/users/{{ $post->user->username }}" class="text-sm text-blue-500 bg-blue-900/20 rounded-lg px-1 py-0.5 hover:underline ">{{$post->user->username}}</a>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            <div>
                <x-page-header>{{ $post->title }}</x-page-header>
                <div>
                    {{ $post->body }}
                </div>
            </div>
        </div>
    </div>

    
    <div class="space-y-6">
        <div class="border border-gray-700 rounded-lg px-6 py-4">
            <x-forms.form method="POST" action="/comments">
                <x-forms.input label="" name="post" type="hidden" value="{{$post->id}}"/>
                <x-forms.textarea label="" name="body"/>
            
                <x-forms.button>Reply</x-forms.button>
            </x-forms.form>
        </div>

        @foreach ($comments as $comment)
            <x-comment :comment="$comment" :post="$post"/>
        @endforeach

    </div>
</x-layout>