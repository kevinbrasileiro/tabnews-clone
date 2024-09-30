<x-layout>
    <x-userinfo-header :user="$user"/>
    <div class="flex space-x-6 border-b border-white/20 mb-6">
        <x-userinfo-nav :user="$user"/>
    </div>

    <div class="space-y-4">
        <p>Member since {{ $user->created_at->diffForHumans() }}</p>
        <div>
            <p class="text-sm text-gray-500">Description</p>
            <div class="border border-gray-700 rounded-lg px-6 py-4">
                {!! nl2br(htmlspecialchars($user->description, ENT_QUOTES)) !!}
            </div>
        </div>
    </div>

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