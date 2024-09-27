@props(['comment', 'post'])

<div class="space-y-1" id="{{$comment->id}}">
    <div class="flex space-x-2 items-center">
        <a href="/users/{{ $comment->user->username}}" class="text-sm text-blue-500 bg-blue-900/20 rounded-lg px-1 py-0.5 hover:underline ">{{$comment->user->username}}</a>
        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
    </div>
    <div>
        {{ $comment->body }}
    </div>
    <div class="space-y-6">
        <x-forms.form method="POST" action="/comments/reply">
            <x-forms.input :label="false" name="post" type="hidden" value="{{$post->id}}"/>
            <x-forms.input :label="false" name="comment" type="hidden" value="{{$comment->id}}"/>
            <x-forms.textarea :label="false" name="body"/>
        
            <x-forms.button>Reply</x-forms.button>
        </x-forms.form>

        @if ($comment->replies->count())
            @foreach ($comment->replies as $comment)
                <div class="ml-8">
                    <x-comment :comment="$comment" :post="$post"/>
                </div>
            @endforeach
        @endif
    </div>
</div>