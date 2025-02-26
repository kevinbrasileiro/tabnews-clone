<x-layout>
    <div class="space-y-6">
        <ol class="space-y-4" type="1" start="{{ ($posts->currentPage() - 1) * $posts->perPage() + 1}}">
            <x-page-header>Displaying results for '{{$query}}' search</x-page-header>
            @if (!$posts->count())
            Could not find any posts matching search query.
            @endif
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
        </ol>
        {{ $posts->links() }}
    </div>
</x-layout>