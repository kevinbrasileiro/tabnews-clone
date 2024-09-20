<x-layout>
    <h1 class="font-bold text-4xl mb-8">{{$user->username}}</h1>
    <div class="flex space-x-6 border-b border-white/20 mb-6">
        <x-nav-link href="/users/{{$user->username}}">Profile</x-nav-link>
        <x-nav-link href="/users/{{$user->username}}/posts">Posts</x-nav-link>
        <x-nav-link href="/users/{{$user->username}}/comments">Comments</x-nav-link>
    </div>
    <p>Created at: {{$user->created_at}}</p>
    @if ($user->id === Auth()->id())
        <div class="mt-4">
            <form method="POST" action="/logout">
                @csrf
                @method('DELETE')
                <button 
                class="border border-red-500 text-red-500 px-3 py-2 rounded-lg hover:bg-red-500 hover:text-white transition-colors duration-300">
                    Log Out
                </button>
            </form>
        </div>
    @endif
</x-layout>