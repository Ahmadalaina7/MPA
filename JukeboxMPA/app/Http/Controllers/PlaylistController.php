<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Song::doesntHave('genre')->delete();
        $playlists = Playlist::with('songs')->get();
        return view("playlists.index" , ["playlists" => $playlists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $songs = Song::all();
        return view("playlists.createplaylist", ["songs" => $songs]);
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        // Implementation for showing a single playlist can go here if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        $songs = Song::all();
        return view('playlists.edit', compact('playlist', 'songs'));
    }

    /**
     * Update the specified resource in storage.
     */
public function store(Request $request)
{
    $playlist = Playlist::create([
        'name' => $request->get('playlistName'),
        'user_id' => Auth::id(),
    ]);

    $playlist->songs()->sync($request->get('playlistSongs')); // Manage the song associations here

    return redirect()->route('playlists.index')->with('success', 'Playlist created successfully');
}

public function update(Request $request, Playlist $playlist)
{
    $request->validate([
        'playlistName' => 'required|string|max:255',
    ]);

    $playlist->update([
        'name' => $request->get('playlistName'),
    ]);

    $playlist->songs()->sync($request->get('playlistSongs')); // Update the song associations here

    return redirect()->route('playlists.index')->with('success', 'Playlist updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->songs()->detach();
        $playlist->delete();
        return redirect()->route('playlists.index')->with('success', 'Playlist deleted successfully');
    }
}
