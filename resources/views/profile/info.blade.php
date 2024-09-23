<x-layout>
    <x-page-header>{{ $user->username }}</x-page-header>
    <div class="flex space-x-6 border-b border-white/20 mb-6">
        <x-userinfo-nav :user="$user"/>
    </div>
    <p>Created at: {{$user->created_at}}</p>
    @if ($user->id === Auth()->id())
        <div class="mt-6">
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