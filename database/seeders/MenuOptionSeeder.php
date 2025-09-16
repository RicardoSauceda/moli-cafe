<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            ['option_name' => 'Mostrar Menu PDF', 'status' => true, 'created_at' => now(), 'updated_at' => now()],
            ['option_name' => 'Permitir puntuacion', 'status' => true, 'created_at' => now(), 'updated_at' => now()],
            ['option_name' => 'Mostrar Puntiacion', 'status' => true, 'created_at' => now(), 'updated_at' => now()],
        ];

        // Upsert para evitar duplicados si el seeder se corre múltiples veces
        DB::table('menu_options')->upsert(
            $options,
            ['option_name'], // unique by option_name
            ['status', 'updated_at']
        );
    }
}
