<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::insert([
            ['name' => 'Eneng', 'description' => 'Sangat bermanfaat untuk anak sekolah belajar daring', 'gender' => 'female'],
            ['name' => 'Udin', 'description' => 'Harga murah, kualitas gak murahan', 'gender' => 'male'],
            ['name' => 'Siti', 'description' => 'Internetnya lancar, jarang gangguan', 'gender' => 'female'],
        ]);
    }
}
