<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik', 'description' => 'Produk elektronik dan gadget'],
            ['name' => 'Fashion', 'description' => 'Pakaian dan aksesoris'],
            ['name' => 'Makanan', 'description' => 'Makanan dan minuman'],
            ['name' => 'Buku', 'description' => 'Buku dan alat tulis'],
            ['name' => 'Olahraga', 'description' => 'Peralatan olahraga'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
