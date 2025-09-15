<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('database/menu/menu.json');

        if (!File::exists($path)) {
            $this->command?->warn("No se encontró el archivo: {$path}");
            return;
        }

        try {
            $data = json_decode(File::get($path), true, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $e) {
            $this->command?->error('Error al parsear menu.json: ' . $e->getMessage());
            return;
        }

        $menu = $data['menu'] ?? [];
        foreach ($menu as $category) {
            $name = $category['categoria'] ?? null;
            if (!$name) {
                continue;
            }

            Category::firstOrCreate([
                'name' => $name,
            ]);
        }

        $this->command?->info('Categorías sembradas correctamente.');
    }
}
