<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Technology Training',
                'description' => 'Hands-on learning focusing on electronics, IoT, and modern technology.',
                'image_url' => 'image1.png',
            ],
            [
                'name' => 'Robotics Workshop',
                'description' => 'Build robots and automation systems with collaborative learning.',
                'image_url' => 'image2.png',
            ],
            [
                'name' => 'Software Development',
                'description' => 'Learn to design and deploy modern applications.',
                'image_url' => 'image.png',
            ],
            [
                'name' => 'Business Scaling Expert',
                'description' => 'Program khusus bagi pengusaha yang ingin memperluas jangkauan pasar dan mengoptimalkan sistem operasional perusahaan.',
                'image_url' => 'image1.png',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
