<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Pedro',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'is_admin' => true,
            'first_time' => false,
            'photo' => 'users/Ellipse 1.png'
        ]);
    }
}
