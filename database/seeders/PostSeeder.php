<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            'Tutorial php'
        ];

        foreach ($judul as $j){
            $slug = Str::slug($j);
            $slugOri = $slug;
            $count = 1;
            while (Post::where('slug', $slug)->exists()){
                $count++;
                $slug = $slugOri . "-" . $count;
            }

            Post::create([
                'title' => $j,
                'slug'=> $slug,
                'decription' => 'Deskripsi untuk ' . $j,
                'content' => 'konten untuk ' . $j,
                'status' => 'publish',
                'user_id' => '1'
            ]);
        }
    }
}
