<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
<div class="flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-gray-800 text-white shadow">
        <nav class="container mx-auto px-4 py-4" style="background-color: gray; color: #FFFFFF;">
            <ul class="flex space-x-6">
                <li><a class="hover:text-gray-300" href="/home">Home</a></li>
                <li class="relative group">
                    <a class="hover:text-gray-300" href="/songs">Songs</a>
                </li>
                <li class="relative group">
                    <a class="hover:text-gray-300" href="/genres/all">Genres</a>
                </li>
                <li class="relative group">
                    <a class="hover:text-gray-300" href="/playlists/">Playlist</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8" style="background-image: url('images/mercedes.jpg'); background-size: 900px; background-position: center; background-repeat: no-repeat;">
            @yield('content')
        </main>
    <!-- Footer -->
    <footer class="container mx-auto px-4 py-4" style="background-color: gray; color: #FFFFFF;">
        <div class="container mx-auto text-center">
            <p>&copy; havik</p>
        </div>
    </footer>
</div>
</body>
</html>
