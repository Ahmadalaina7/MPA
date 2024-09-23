<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{ 
    protected $fillable = ["name", "genre_id", "artist", "duration"];
    use HasFactory;

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }
}
