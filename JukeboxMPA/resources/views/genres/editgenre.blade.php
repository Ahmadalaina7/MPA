@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-semibold mb-6">Edit Genre</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="genreName" class="block text-sm font-medium text-gray-700">Genre Name:</label>
                <input type="text" id="genreName" name="genreName" value="{{ old('genreName', $genre->name) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Genre
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
