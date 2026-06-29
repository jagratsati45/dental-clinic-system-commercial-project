<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@clinic.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@clinic.com',
            'password' => Hash::make('12345678'),
            'role' => 'doctor',
        ]);

        User::create([
            'name' => 'Receptionist',
            'email' => 'reception@clinic.com',
            'password' => Hash::make('12345678'),
            'role' => 'receptionist',
        ]);
    }
}