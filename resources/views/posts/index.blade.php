<x-layout>
    <div class="space-y-6">
        <ol class="space-y-4" type="1" start="{{ ($posts->currentPage() - 1) * 30 + 1}}">
            @foreach ($posts as $post)
                <li class="list-decimal">
                    <a href="/posts/{{$post->id}}" class="hover:underline">{{$post->title}}</a>
                    <div class="flex space-x-2">
                        <p class="text-sm text-gray-500">{{$post->user->username}}</p>
                    </div>
                </li>
            @endforeach
        </ol>
        {{ $posts->links() }}
    </div>
</x-layout>