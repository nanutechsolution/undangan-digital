<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;
use Illuminate\Support\Str;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Theme::create([
            'name' => 'Rustic Elegance',
            'slug' => Str::slug('Rustic Elegance'),
            'thumbnail' => 'rustic_thumbnail.jpg',
            'price' => 50000,
            'is_active' => true,
        ]);

        Theme::create([
            'name' => 'Modern Minimalist',
            'slug' => Str::slug('Rustic adf'),
            'thumbnail' => 'modern_thumbnail.jpg',
            'price' => 75000,
            'is_active' => true,
        ]);

        Theme::create([
            'name' => 'Classic Glamour',
            'slug' => Str::slug('Rustic Ate'),
            'thumbnail' => 'classic_thumbnail.jpg',
            'price' => 100000,
            'is_active' => true,
        ]);

        // Buat file gambar dummy agar tidak error
        $this->createDummyImages();
    }

    private function createDummyImages()
    {
        $path = public_path('storage/themes');
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        // Buat file dummy
        file_put_contents($path . '/rustic_thumbnail.jpg', 'rustic_image_content');
        file_put_contents($path . '/modern_thumbnail.jpg', 'modern_image_content');
        file_put_contents($path . '/classic_thumbnail.jpg', 'classic_image_content');
    }
}