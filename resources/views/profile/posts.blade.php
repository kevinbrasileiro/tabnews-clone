<x-layout>
    <h1 class="font-bold text-4xl mb-8">{{$user->username}}</h1>
    <div class="flex space-x-6 border-b border-white/20 mb-6">
        <x-nav-link href="/users/{{$user->username}}">Profile</x-nav-link>
        <x-nav-link href="/users/{{$user->username}}/posts">Posts</x-nav-link>
        <x-nav-link href="/users/{{$user->username}}/comments">Comments</x-nav-link>
    </div>
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