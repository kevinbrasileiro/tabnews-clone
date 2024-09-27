<x-layout>
    <x-page-header>{{ $user->username }}</x-page-header>
    <div class="flex space-x-6 border-b border-white/20 mb-6">
        <x-userinfo-nav :user="$user"/>
    </div>
    <div class="space-y-6">
        <ol class="space-y-4" type="1" start="{{ ($comments->currentPage() - 1) * $comments->perPage() + 1}}">
            @foreach ($comments as $comment)
                <li class="list-decimal">
                    <a href="/{{$comment->post->user->username}}/{{$comment->post->title . '#' . $comment->id}}" class="hover:underline flex items-center gap-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="#e8eaed"><path d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM880-80 720-240H160q-33 0-56.5-23.5T80-320v-480q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v720ZM160-320h594l46 45v-525H160v480Zm0 0v-480 480Z"/></svg>
                        {{$comment->body}}
                    </a>
                    <div class="flex space-x-2">
                        <a href="/users/{{$comment->user->username}}" class="text-sm text-gray-500 hover:underline">{{$comment->user->username}}</a>
                        <span class="text-sm text-gray-500">/</span>
                        <p class="text-sm text-gray-500">{{$comment->replies->count()}} comments</p>
                        <span class="text-sm text-gray-500">/</span>
                        <p class="text-sm text-gray-500">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                </li>
            @endforeach

            @if (!$comments->count())
                This account does not have any comments.
            @endif
            
        </ol>
        {{ $comments->links() }}
    </div>
</x-layout>