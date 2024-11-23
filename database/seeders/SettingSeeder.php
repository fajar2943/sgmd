<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            ['name' => 'address', 'value' => 'Gembong Utara,No.30,  Kedungwuni, Pekalongan 51173'],
            ['name' => 'email', 'value' => 'your@gmail.com'],
            ['name' => 'phone', 'value' => '0821-5886-3345'],
            ['name' => 'wa', 'value' => '6282158863345'],
            ['name' => 'fb', 'value' => 'https://www.facebook.com/fajarlintanggumilang/'],
            ['name' => 'x', 'value' => '#'],
            ['name' => 'ig', 'value' => 'https://www.instagram.com/fajarlintang10/'],
            ['name' => 'open', 'value' => '09:00 AM - 18:00 PM'],
            ['name' => 'payment', 'value' => 'XENDIT'],
            ['name' => 'wa_token', 'value' => 'abcd'],
        ]);
    }
}
