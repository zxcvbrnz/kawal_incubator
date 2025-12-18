<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ParticipantProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bersihkan data lama agar tidak duplikat saat seeding ulang
        // Participant::truncate(); 
        // Product::truncate();

        // 2. Buat Partisipan
        $names = ['Disiko Mano', 'Ahmad Fikri', 'Siska Amelia'];
        foreach ($names as $name) {
            Participant::create(['name' => $name]);
        }

        // 3. Ambil semua ID yang baru saja dibuat
        $participantIds = Participant::pluck('id')->toArray();

        // 4. Buat 5 Produk dengan image1.png sampai image5.png
        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'name' => "Product Showcase $i",
                'image_url' => "image$i.png",
                'participant_id' => $participantIds[($i - 1) % count($participantIds)],
                'display' => true,
            ]);
        }
    }
}
