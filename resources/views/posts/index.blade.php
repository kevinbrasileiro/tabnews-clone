<x-layout>
    <div class="space-y-6">
        <ol class="space-y-4" type="1" start="{{ ($posts->currentPage() - 1) * $posts->perPage() + 1}}">
            @foreach ($posts as $post)
                <li class="list-decimal">
                    <a href="/posts/{{$post->title}}" class="hover:underline">{{$post->title}}</a>
                    <div class="flex space-x-2">
                        <a href="/users/{{$post->user->username}}" class="text-sm text-gray-500 hover:underline">{{$post->user->username}}</a>
                    </div>
                </li>
            @endforeach
        </ol>
        {{ $posts->links() }}
    </div>
</x-layout>