<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TabNews Clone</title>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet"> --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-[#070A0D] text-white pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            
            <div class="flex space-x-6 items-center">
                <div class="flex space-x-1 items-center">
                    <a href="/">
                        <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.9999 4C20.6568 4 21.9999 5.34315 21.9999 7V17C21.9999 18.6569 20.6568 20 18.9999 20H4.99994C3.34308 20 1.99994 18.6569 1.99994 17V7C1.99994 5.34315 3.34308 4 4.99994 4H18.9999ZM19.9999 9.62479H13C12.4478 9.62479 11.8442 9.20507 11.652 8.68732L10.6542 6H4.99994C4.44765 6 3.99994 6.44772 3.99994 7V17C3.99994 17.5523 4.44765 18 4.99994 18H18.9999C19.5522 18 19.9999 17.5523 19.9999 17V9.62479Z" fill="currentColor"></path></svg>
                    </a>
                    <x-nav-link href="/">TabNews</x-nav-link>
                </div>
                <x-nav-link href="/">Top</x-nav-link>
                <x-nav-link href="/">Recent</x-nav-link>   
            </div>

            @auth
                <div class="flex space-x-6">
                    <x-nav-link href="/posts/create">Recent</x-nav-link>

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button>Log Out</button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="space-x-6">
                    <x-nav-link href="/register">Register</x-nav-link>
                    <x-nav-link href="/login">Log In</x-nav-link>
                </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-[986px] m-auto">
            {{ $slot }}
        </main>
    </div>
</body>
</html>