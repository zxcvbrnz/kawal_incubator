<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ParticipantProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data Lengkap Partisipan (3 Orang)
        $participantsData = [
            [
                'business_name' => 'Aroma Kopi Nusantara',
                'owner_name'    => 'Disiko Mano',
                'contact'       => '081234567890',
                'business_field' => 'Food & Beverage',
                'province'      => 'Jawa Barat',
                'city'          => 'Bandung',
                'district'      => 'Coblong',
                'village'       => 'Dago',
                'address_detail' => 'Jl. Ir. H. Juanda No. 123, Dago Bawah',
                'postal_code'   => '40135',
                'omset'         => 'Rp 15.000.001 - Rp 50.000.000',
                'market_reach'  => 'Nasional',
                'ig'            => '@aromakopi.id',
                'wa'            => '6281234567890',
                'legalitas'     => 'NIB',
                'certification' => 'Halal',
                'has_incubated' => true,
                'incubation_institution' => 'Inkubator Bisnis Bandung',
                'incubation_start'       => '2023-01-10',
                'incubation_end'         => '2023-06-10',
                'description'   => 'Produsen kopi biji asli pilihan dari berbagai pegunungan di Indonesia.',
                'profile_photo' => 'image1.png',
                'business_profile_file' => 'tes123.pdf',
                'status' => true,
            ],
            [
                'business_name' => 'Gaya Craft Mandiri',
                'owner_name'    => 'Ahmad Fikri',
                'contact'       => '085711223344',
                'business_field' => 'Kriya & Kerajinan',
                'province'      => 'Jawa Tengah',
                'city'          => 'Semarang',
                'district'      => 'Tembalang',
                'village'       => 'Bulu Lor',
                'address_detail' => 'Kawasan Industri Candi Blok A-12',
                'postal_code'   => '50179',
                'omset'         => 'Rp 50.000.001 - Rp 100.000.000',
                'market_reach'  => 'Internasional',
                'tiktok'        => '@gayacraft.official',
                'wa'            => '6285711223344',
                'legalitas'     => 'PT',
                'certification' => 'Lainnya',
                'certification_other' => 'ISO 9001',
                'has_incubated' => false,
                'description'   => 'Ekspor kerajinan tangan berbahan dasar anyaman bambu modern.',
                'profile_photo' => 'image2.png',
                'business_profile_file' => 'tes123.pdf',
                'status' => true,
            ],
            [
                'business_name' => 'Siska Amelia Fashion',
                'owner_name'    => 'Siska Amelia',
                'contact'       => '082199887766',
                'business_field' => 'Fashion & Tekstil',
                'province'      => 'DKI Jakarta',
                'city'          => 'Jakarta Selatan',
                'district'      => 'Mampang Prapatan',
                'village'       => 'Kuningan Barat',
                'address_detail' => 'Apartment Thamrin City Tower B, No. 5',
                'postal_code'   => '12710',
                'omset'         => 'Rp 100.000.001+',
                'market_reach'  => 'Jabodetabek',
                'ig'            => '@siskafashion.store',
                'fb'            => 'Siska Amelia Fashion',
                'wa'            => '6282199887766',
                'legalitas'     => 'Lainnya',
                'legalitas_other' => 'CV',
                'certification' => 'HAKI',
                'has_incubated' => true,
                'incubation_institution' => 'Jakarta Creative Hub',
                'incubation_start'       => '2024-02-01',
                'incubation_end'         => '2024-05-01',
                'description'   => 'Brand fashion muslimah premium dengan desain eksklusif.',
                'profile_photo' => 'image3.png',
                'business_profile_file' => 'tes123.pdf',
                'status' => true,
            ],
        ];

        foreach ($participantsData as $data) {
            Participant::create($data);
        }

        // 2. Buat Produk Showcase untuk masing-masing Partisipan
        $participantIds = Participant::pluck('id')->toArray();

        foreach ($participantIds as $index => $id) {
            Product::create([
                'name' => "Katalog Unggulan Partisipan " . ($index + 1),
                'image_url' => "image" . (($index % 5) + 1) . ".png",
                'participant_id' => $id,
                'display' => true,
            ]);
        }
    }
}