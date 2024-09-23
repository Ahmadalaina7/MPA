@csrf
@method('PUT')

<div class="mb-4">
    <label for="songName" class="block text-sm font-medium text-gray-700">Song Name:</label>
    <input type="text" id="songName" name="songName" value="{{ old('songName', $song->name) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
</div>

<div class="mb-4">
    <label for="songArtist" class="block text-sm font-medium text-gray-700">Artist:</label>
    <input type="text" id="songArtist" name="songArtist" value="{{ old('songArtist', $song->artist) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
</div>

<div class="mb-4">
    <label for="songDuration" class="block text-sm font-medium text-gray-700">Duration (in seconds):</label>
    <input type="number" id="songDuration" name="songDuration" value="{{ old('songDuration', $song->duration) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
</div>

<div class="mb-4">
    <label for="songGenre" class="block text-sm font-medium text-gray-700">Genre:</label>
    <select id="songGenre" name="songGenre" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}" {{ old('songGenre', $song->genre_id) == $genre->id ? 'selected' : '' }}>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="flex justify-end">
    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Update Song
    </button>
</div>
