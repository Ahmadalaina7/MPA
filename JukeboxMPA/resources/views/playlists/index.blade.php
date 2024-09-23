@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-semibold mb-6">Playlists</h1>
    <div class="mb-6">
        <a href="{{ route('playlists.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
            Create New Playlist
        </a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="w-1/4 px-4 py-2 text-left text-sm font-medium text-black-500 uppercase tracking-wider">Name</th>
                    <th class="w-1/4 px-4 py-2 text-left text-sm font-medium text-black-500 uppercase tracking-wider">Total Duration</th>
                    <th class="w-1/4 px-4 py-2 text-left text-sm font-medium text-black-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($playlists as $playlist)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $playlist->name }}</td>
                        <td class="px-4 py-2">{{ gmdate('H:i:s', $playlist->total_duration) }}</td> <!-- Display total duration -->
                        <td class="px-4 py-2">
                            <a href="{{ route('playlists.edit', $playlist->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this playlist?')" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
