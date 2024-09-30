<x-layout>
    <x-userinfo-header :user="$user"/>
    <div class="flex space-x-6 border-b border-white/20 mb-6">
        <x-userinfo-nav :user="$user"/>
    </div>
    <div class="space-y-6">
        <ol class="space-y-4" type="1" start="{{ ($posts->currentPage() - 1) * $posts->perPage() + 1}}">
            @foreach ($posts as $post)
                <li class="list-decimal">
                    <a href="/{{$post->user->username}}/{{$post->slug}}" class="hover:underline">{{$post->title}}</a>
                    <div class="flex space-x-2">
                        <a href="/users/{{$post->user->username}}" class="text-sm text-gray-500 hover:underline">{{$post->user->username}}</a>
                        <span class="text-sm text-gray-500">/</span>
                        <p class="text-sm text-gray-500">{{$post->comments_count}} comments</p>
                        <span class="text-sm text-gray-500">/</span>
                        <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                    </div>
                </li>
            @endforeach

            @if (!$posts->count())
                This account does not have any posts.
            @endif
            
        </ol>
        {{ $posts->links() }}
    </div>
</x-layout>