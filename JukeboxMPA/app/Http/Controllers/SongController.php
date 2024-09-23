<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Genre;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index(Request $request)
    {
        Song::doesntHave('genre')->delete();
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('songs.createsong', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'songName' => 'required|string|max:255',
            'songArtist' => 'required|string|max:255',
            'songDuration' => 'required|integer|min:1|max:1080',
            'songGenre' => 'required|exists:genres,id',
        ]);

        Song::create([
            'name' => $request->songName,
            'artist' => $request->songArtist,
            'duration' => $request->songDuration,
            'genre_id' => $request->songGenre,
        ]);

        return redirect()->route('songs.index')->with('success', 'Song created successfully');
    }

    public function edit(Song $song)
    {
        $genres = Genre::all();
        return view('songs.editsong', compact('song', 'genres'));
    }

    public function update(Request $request, Song $song)
    {
        $request->validate([
            'songName' => 'required|string|max:255',
            'songArtist' => 'required|string|max:255',
            'songDuration' => 'required|integer|min:1|max:1080',
            'songGenre' => 'required|exists:genres,id',
        ]);

        $song->update([
            'name' => $request->songName,
            'artist' => $request->songArtist,
            'duration' => $request->songDuration,
            'genre_id' => $request->songGenre,
        ]);

        return redirect()->route('songs.index')->with('success', 'Song updated successfully');
    }
    public function destroy($id)
    {
        // Fetch the song by ID
        $song = Song::findOrFail($id);
    
        // Delete the song
        $song->delete();
    
        // Redirect back to the song index with a success message
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
    }
    
}
