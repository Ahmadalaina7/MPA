@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-semibold mb-6">Add New Song</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('songs.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="songName" class="block text-sm font-medium text-gray-700">Song Name:</label>
                <input type="text" id="songName" name="songName" value="{{ old('songName') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="songArtist" class="block text-sm font-medium text-gray-700">Artist:</label>
                <input type="text" id="songArtist" name="songArtist" value="{{ old('songArtist') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="songDuration" class="block text-sm font-medium text-gray-700">Duration (in seconds):</label>
                <input type="number" id="songDuration" name="songDuration" value="{{ old('songDuration') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="songGenre" class="block text-sm font-medium text-gray-700">Genre:</label>
                <select id="songGenre" name="songGenre" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('songGenre') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Song
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
