<?php

namespace Database\Seeders;

use App\Models\SalsabilaService;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Cuci Kering',
                'price' => 8000,
                'description' => 'Layanan cuci kering tanpa setrika',
            ],
            [
                'name' => 'Cuci Setrika',
                'price' => 12000,
                'description' => 'Layanan cuci lengkap dengan setrika rapi',
            ],
            [
                'name' => 'Setrika Saja',
                'price' => 7000,
                'description' => 'Layanan setrika saja tanpa cuci',
            ],
            [
                'name' => 'Cuci Karpet',
                'price' => 20000,
                'description' => 'Layanan cuci karpet dengan bahan khusus',
            ],
        ];

        foreach ($services as $service) {
            SalsabilaService::create($service);
        }
    }
}
