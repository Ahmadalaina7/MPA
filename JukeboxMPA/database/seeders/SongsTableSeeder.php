<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Song::create([
            'name' => 'Song Title 1',
            'genre_id' => 1,
            'artist' => 'Artist 1',
            'duration' => 180,
        ]);

        Song::factory()->count(50)->create();

        
        
    }
}
