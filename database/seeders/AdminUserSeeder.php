<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asunciones: email de admin fijo y columnas opcionales pueden ser nulas
        $email = 'admin@molicafe.local';

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'moli_cafe_admin',
                'password' => Hash::make('mol1c4f3_'),
                // Campos adicionales si existen en la migración
                'middle_name' => null,
                'last_name' => null,
                'birth_date' => null,
                'email_verified_at' => now(),
            ]
        );
    }
}
