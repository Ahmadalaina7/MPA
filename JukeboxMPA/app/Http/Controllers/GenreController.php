<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showgenres(){
        $genres = Genre::all();
        return view("genres.genres", ["genres" => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("genres.creategenre");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            "genreName" => "min:3|string|unique:genres,name|required"
        ]);

        Genre::create([
            "name" => $request->get("genreName")
        ]);

        return redirect()->route("genres.all");
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.editgenre', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'genreName' => 'required|string|max:255|unique:genres,name,' . $genre->id,
        ]);

        $genre->update([
            'name' => $request->get('genreName'),
        ]);

        return redirect()->route('genres.all')->with('success', 'Genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $songs = Song::where('genre_id', $genre->id)->get();

        // Delete each song and its associations in playlists
        foreach ($songs as $song) {
            // Detach song from all playlists
            $song->playlists()->detach();
    
            // Delete the song
            $song->delete();
        }
        $genre->delete();

    
        return redirect()->route('genres.all')->with('success', 'Genre and all related songs have been deleted.');
        }
    
    

}
