<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('welcome.welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("/home", [WelcomeController::class, "welcome"])->name('welcome');
    Route::get("/genres/all", [GenreController::class, "showgenres"])->name("genres.all");


    Route::get("/genres/create", [GenreController::class, "create"])->name('genres.create');
    Route::post("/genres/store", [GenreController::class, "store"])->name('genres.store');
    route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');
    Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.destroy');

    Route::get('/playlists/{playlist}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
    Route::put('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update');
    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
    Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');

// Song routes
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');
// Genre routes
    Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');


    Route::get("/playlist/create", [PlaylistController::class, "create"])->name('playlist.create');
    Route::post("/playlist/store", [PlaylistController::class, "store"])->name('playlist.store');
});

require __DIR__.'/auth.php';
