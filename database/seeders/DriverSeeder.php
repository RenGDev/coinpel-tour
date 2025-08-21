<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        Driver::create([
            'name' => 'Carlos Silva',
            'email' => 'carlos.motorista@gmail.com',
            'phone' => '(11) 99999-1111',
            'photo' => null,
            'bornDate' => '1985-07-10',
            'registration' => 'REG12345',
            'cpf' => '123.456.789-01',
            'rg' => 'MG-12.345.678',
            'cep' => '12345-678',
            'address' => 'Rua A',
            'number' => '100',
            'city' => 'São Paulo',
            'state' => 'SP',
        ]);

        Driver::create([
            'name' => 'Fernanda Costa',
            'email' => 'fernanda.motorista@gmail.com',
            'phone' => '(21) 98888-2222',
            'photo' => null,
            'bornDate' => '1990-03-15',
            'registration' => 'REG67890',
            'cpf' => '987.654.321-00',
            'rg' => 'RJ-98.765.432',
            'cep' => '87654-321',
            'address' => 'Avenida B',
            'number' => '200',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
        ]);
    }
}
