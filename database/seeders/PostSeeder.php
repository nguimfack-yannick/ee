<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;


class PostSeeder extends Seeder {
    public function run(): void {
        Post::create([
            'title' => 'Événement Santé 2025',
            'description' => 'Un aperçu de notre dernier événement de sensibilisation.',
            'image_path' => '/image/sample-media.jpg',
        ]);
        Post::create([
            'title' => 'Campagne Vaccination',
            'description' => 'Détails de notre campagne de vaccination récente.',
            'image_path' => '/image/sample-media.jpg',
        ]);
    }
}