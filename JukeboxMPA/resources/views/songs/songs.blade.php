@extends('layouts.master')
@section('title')
    Songs
@endsection
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Welkom op mijn jukebox pagina met songs</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('songs.index') }}" class="mb-6 flex items-center">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search for songs or genres"
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"
            >
            <button
                type="submit"
                class="ml-2 px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-300"
            >
                Search
            </button>
            <a
                href="/songs/create"
                class="ml-2 px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-300"
            >
                Add Music
            </a>
        </form>

        <!-- Total Duration -->
        <p class="mb-4 text-gray-700">Total Duration: <span class="font-semibold">{{ gmdate('H:i:s', $totalDuration) }}</span></p>

        <!-- Songs List -->
        <ul class="space-y-4">
            @foreach($songs as $song)
                <li class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center">
                    <div>
                        <div class="text-lg font-semibold">{{ $song->name }}</div>
                        <div class="text-gray-600">Genre: {{ $song->genre->name }}</div>
                        <div class="text-gray-600">Duration: {{ gmdate('H:i:s', $song->duration) }}</div>
                    </div>
                    <div class="flex space-x-2">
                        <button onclick="openEditModal('song-{{ $song->id }}')" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Edit</button>
                        <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this song?')" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </div>
                </li>

                <!-- Edit Modal -->
                <div id="song-{{ $song->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                            <h2 class="text-xl font-bold mb-4">Edit Song</h2>
                            <form action="{{ route('songs.update', $song->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="songName-{{ $song->id }}" class="block text-gray-700 font-semibold mb-2">Song Name</label>
                                    <input type="text" name="songName" id="songName-{{ $song->id }}" value="{{ $song->name }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200">
                                </div>
                                <div class="mb-4">
                                    <label for="songArtist-{{ $song->id }}" class="block text-gray-700 font-semibold mb-2">Song Artist</label>
                                    <input type="text" name="songArtist" id="songArtist-{{ $song->id }}" value="{{ $song->artist }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200">
                                </div>
                                <div class="mb-4">
                                    <label for="songDuration-{{ $song->id }}" class="block text-gray-700 font-semibold mb-2">Song Duration</label>
                                    <input type="number" name="songDuration" id="songDuration-{{ $song->id }}" value="{{ $song->duration }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200">
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" onclick="closeEditModal('song-{{ $song->id }}')" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-300 mr-2">Cancel</button>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

    <script>
        function openEditModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }
        function closeEditModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection
