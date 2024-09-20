@props(['user'])

<x-nav-link href="/users/{{$user->username}}" :active="request()->is('users/' . $user->username)">Profile</x-nav-link>
<x-nav-link href="/users/{{$user->username}}/posts" :active="request()->is('users/' . $user->username. '/posts')">Posts</x-nav-link>
<x-nav-link href="/users/{{$user->username}}/comments" :active="request()->is('users/' . $user->username. '/comments')">Comments</x-nav-link>