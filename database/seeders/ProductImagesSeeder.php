<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ProductImagesSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            $folder = storage_path("app/public/products/{$product->id}");
            if (!is_dir($folder)) continue;

            $files = scandir($folder);
            $sortOrder = 0;

            foreach ($files as $file) {
                if (in_array($file, ['.', '..'])) continue;

                $isMain = str_starts_with($file, 'main');
                if (!$isMain) $sortOrder++;

                Image::create([
                    'product_id' => $product->id,
                    'path' => "public/products/{$product->id}/{$file}",
                    'is_main' => $isMain,
                    'sort_order' => $sortOrder,
                ]);
            }
        }
    }
}
