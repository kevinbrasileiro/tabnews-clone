@props(['comment'])

<div class="space-y-1">
    <div class="flex space-x-2 items-center">
        <a href="/users/{{ $comment->user->username}}" class="text-sm text-blue-500 bg-blue-900/20 rounded-lg px-1 py-0.5 hover:underline ">{{$comment->user->username}}</a>
        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
    </div>
    <div>
        {{ $comment->body }}
    </div>
</div>