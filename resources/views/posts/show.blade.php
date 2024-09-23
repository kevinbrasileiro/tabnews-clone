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
        <div>
            <div class="flex space-x-2 items-center">
                <a href="/users/{{ $post->user->username }}" class="text-sm text-blue-500 bg-blue-900/20 rounded-lg px-1 py-0.5 hover:underline ">{{$post->user->username}}</a>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            <x-page-header>{{ $post->title }}</x-page-header>
            <div class="">
                {{ $post->body }}
            </div>
        </div>
    </div>

    <div>
        <div class="border border-gray-700 rounded-lg px-6 py-4">
            <button class="hover:text-gray-400 transition-colors duration-150 cursor-pointer">Reply</button>
        </div>

        @foreach ($comments as $comment)
            <p>{{ $comment->body }}</p>
        @endforeach

    </div>
</x-layout>