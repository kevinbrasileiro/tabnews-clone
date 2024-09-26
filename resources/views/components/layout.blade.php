<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TabNews Clone</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-[#0D1117] text-white pb-20">
    <div class="">
        <nav class="bg-[#161B22] flex justify-between items-center py-4 px-6">
            
            <div class="flex space-x-6 items-center">
                <div class="flex space-x-1 items-center">
                    <a href="/">
                        <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.9999 4C20.6568 4 21.9999 5.34315 21.9999 7V17C21.9999 18.6569 20.6568 20 18.9999 20H4.99994C3.34308 20 1.99994 18.6569 1.99994 17V7C1.99994 5.34315 3.34308 4 4.99994 4H18.9999ZM19.9999 9.62479H13C12.4478 9.62479 11.8442 9.20507 11.652 8.68732L10.6542 6H4.99994C4.44765 6 3.99994 6.44772 3.99994 7V17C3.99994 17.5523 4.44765 18 4.99994 18H18.9999C19.5522 18 19.9999 17.5523 19.9999 17V9.62479Z" fill="currentColor"></path></svg>
                    </a>
                    <x-nav-link href="/">TabNews</x-nav-link>
                </div>
                <x-nav-link href="/" :active="request()->is('/')">Popular</x-nav-link>
                <x-nav-link href="/recent" :active="request()->is('recent')">Recent</x-nav-link>   
            </div>

            @auth
                <div class="flex space-x-6">
                    <x-nav-link href="/posts/create" title="Create new post">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                    </x-nav-link>

                    <x-nav-link href="/users/{{Auth()->user()->username}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/></svg>    
                    </x-nav-link>
                </div>
            @endauth

            @guest
                <div class="space-x-6">
                    <x-nav-link href="/login">Login</x-nav-link>
                    <x-nav-link href="/register">Register</x-nav-link>
                </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-4xl m-auto">
            {{ $slot }}
        </main>
    </div>
</body>
</html>