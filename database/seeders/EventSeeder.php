<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'name'        => 'Future Tech Expo 2026',
            'description' => 'Menjelajahi inovasi teknologi masa depan yang akan mengubah cara kita hidup dan bekerja.',
            'slug'        => Str::slug('Future Tech Expo 2026'),
            'start_at'    => '2026-05-10 10:00:00',
            'end_at'      => '2026-05-12 18:00:00',
            'image_url'   => 'image.png', // Menggunakan image1 seperti permintaan Anda
            'location'    => 'ICE BSD, Tangerang',
            'status'      => false, // Status 0 / False
        ]);
        // 1. Buat data Event utama 
        // Note: Pastikan kolom 'image_url' ada di table events jika ini image utamanya
        $event = Event::create([
            'name'        => 'Global Creative Summit 2025',
            'description' => 'Momen luar biasa di mana ribuan talenta lokal berkumpul untuk berbagi visi tentang masa depan industri kreatif di Indonesia.',
            'slug'        => Str::slug('Global Creative Summit 2025'),
            'start_at'    => '2025-11-24 09:00:00',
            'end_at'      => '2025-11-26 21:00:00',
            'image_url' => 'image1.png',
            'location'    => 'Gelora Bung Karno, Jakarta',
            'status'      => true,
        ]);

        // 2. Buat data di table event_images (Image 2 dan Image 3)
        $images = [
            [
                'event_id'          => $event->id,
                'image_url'         => 'image2.png', // Path Image 2
                'image_description' => 'Documentation Image 2',
            ],
            [
                'event_id'          => $event->id,
                'image_url'         => 'image3.png', // Path Image 3
                'image_description' => 'Documentation Image 3',
            ],
        ];

        DB::table('event_images')->insert($images);
    }
}