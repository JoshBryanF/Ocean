<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@example.com',
            'password' => bcrypt('customer123'),
            'role' => 'customer',
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        News::factory()->create([
            'judul' => 'Darurat Sampah Plastik: Ancaman Nyata bagi Ekosistem Lautan',
            'author' => 'marcel',
            'image' => 'storage/news_img/test1.jpg',
            'isi' => 'storage/news_text/test1.txt'
        ]);

        News::factory()->create([
            'judul' => 'Ghost Nets: Jaring Ikan yang Menjadi Ancaman Mematikan di Lautan',
            'author' => 'Fernando',
            'image' => 'storage/news_img/test2.jpg',
            'isi' => 'storage/news_text/test2.txt'
        ]);

        News::factory()->create([
            'judul' => 'Microplastics: Bahaya Tak Terlihat di Piring Makan Kita',
            'author' => 'Kelly',
            'image' => 'storage/news_img/test3.jpg',
            'isi' => 'storage/news_text/test3.txt'
        ]);
    }
}
