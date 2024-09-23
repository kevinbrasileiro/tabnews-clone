<x-layout>
    <x-page-header>{{ $user->username }}</x-page-header>
    <div class="flex space-x-6 border-b border-white/20 mb-6">
        <x-userinfo-nav :user="$user"/>
    </div>
    <div class="space-y-6">
        <ol class="space-y-4" type="1" start="{{ ($comments->currentPage() - 1) * $comments->perPage() + 1}}">
            @foreach ($comments as $comment)
                <li class="list-decimal">
                    <a href="/posts/{{$comment->post->title}}" class="hover:underline">{{$comment->body}}</a>
                    <div class="flex space-x-2">
                        <a href="/users/{{$comment->user->username}}" class="text-sm text-gray-500 hover:underline">{{$comment->user->username}}</a>
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