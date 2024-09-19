<x-layout>
    <div class="space-y-4">
        @foreach ($posts as $post)
            <div class="space">
                <a href="/posts/{{$post->id}}" class="hover:underline">{{$post->title}}</a>
            </div>
        @endforeach
    </div>
</x-layout>