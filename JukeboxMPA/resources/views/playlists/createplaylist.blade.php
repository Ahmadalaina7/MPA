@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-semibold mb-4">Create New Playlist</h1>
    <form action="{{ route('playlists.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="playlistName" class="block text-sm font-medium text-gray-700">Playlist Name:</label>
            <input type="text" id="playlistName" name="playlistName" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="playlistSongs" class="block text-sm font-medium text-gray-700">Select Songs:</label>
            <select id="playlistSongs" name="playlistSongs[]" multiple class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach($songs as $song)
                    <option value="{{ $song->id }}">{{ $song->name }}</option> <!-- Changed from $song->title to $song->name -->
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create Playlist
            </button>
        </div>
    </form>
</div>
@endsection
