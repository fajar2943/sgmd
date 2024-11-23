<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::insert([
            ['name' => 'Paket 6 Jam', 'title' => 'Setengah Hari', 'subtitle' => 'Kecepatan Up to 2 Mbps', 'price' => 3000, 'description' => 'Durasi 6 jam', 'detail' => json_encode(['Unlimited 6 jam', 'Harga Rp 6.000', 'Up to 100 mbps'])],
            ['name' => 'Paket 12 Jam', 'title' => 'Harian', 'subtitle' => 'Kecepatan Up to 2 Mbps', 'price' => 5000, 'description' => 'Durasi 12 jam', 'detail' => json_encode(['Unlimited 12 jam', 'Harga Rp 5.000', 'Up to 100 mbps'])],
            ['name' => 'Paket 24 Jam', 'title' => 'Mingguan', 'subtitle' => 'Kecepatan Up to 2 Mbps', 'price' => 10000, 'description' => 'Masa Aktif 7 Hari', 'detail' => json_encode(['Unlimited 24 jam', 'Harga Rp 10.000', 'Up to 100 mbps'])],
            ['name' => 'Paket 1 Bulan', 'title' => 'Bulanan', 'subtitle' => 'Kecepatan Up to 2 Mbps', 'price' => 75000, 'description' => 'Masa Aktif 30 Hari', 'detail' => json_encode(['Unlimited 1 bulan', 'Harga Rp 75.000', 'Up to 100 mbps'])],
        ]);
    }
}
