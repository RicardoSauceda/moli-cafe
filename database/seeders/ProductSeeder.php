<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
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
            $categoryName = $category['categoria'] ?? null;
            if (!$categoryName) {
                continue;
            }

            $categoryModel = Category::firstOrCreate(['name' => $categoryName]);

            foreach (($category['items'] ?? []) as $item) {
                $name = $item['producto'] ?? null;
                if (!$name) {
                    continue;
                }
                $description = $item['descripcion'] ?? null;
                $price = isset($item['precio']) ? (float) $item['precio'] : null;

                // Evitar duplicados por nombre dentro de la misma categoría
                Product::firstOrCreate(
                    [
                        'product_name' => $name,
                        'category_id' => $categoryModel->id,
                    ],
                    [
                        'description' => $description,
                        'price' => $price ?? 0,
                        'available' => true,
                    ]
                );
            }
        }

        $this->command?->info('Productos sembrados correctamente.');
    }
}
