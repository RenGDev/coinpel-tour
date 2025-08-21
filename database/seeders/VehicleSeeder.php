<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        Vehicle::create([
            'identification_name' => 'Ônibus Executivo',
            'plate' => 'ABC1D23',
            'model' => 'Marcopolo Paradiso G7',
            'chassi' => '9BWZZZ377VT004251',
            'capacity' => 46,
            'bus_type' => 'Executivo',
            'bench' => 'Estofada',
            'year' => 2018,
            'internet' => true,
            'wc' => true,
            'socket' => true,
            'air_conditioning' => true,
            'fridge' => true,
            'heating' => false,
            'video' => true,
        ]);

        Vehicle::create([
            'identification_name' => 'Micro-ônibus Urbano',
            'plate' => 'XYZ9F87',
            'model' => 'Volare W9',
            'chassi' => '8BRZZZ129JT002345',
            'capacity' => 30,
            'bus_type' => 'Urbano',
            'bench' => 'Simples',
            'year' => 2020,
            'internet' => false,
            'wc' => false,
            'socket' => false,
            'air_conditioning' => true,
            'fridge' => false,
            'heating' => false,
            'video' => false,
        ]);
    }
}
