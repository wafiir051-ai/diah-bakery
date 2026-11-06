<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kue;  // ← Tambahkan ini

class KueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Red Velvet',
                'rasa_kategori' => 'Cream Cheese',
                'harga' => 45000,
                'stock' => 10,
                'foto' => 'redvelvet.jpg',
                'deskripsi' => 'Lembut dengan topping cream cheese yang manis'
            ],
            [
                'nama' => 'Chocolate Lava',
                'rasa_kategori' => 'Coklat',
                'harga' => 55000,
                'stock' => 5,
                'foto' => 'chocolava.jpg',
                'deskripsi' => 'Meleleh di mulut dengan isian coklat panas'
            ],
            [
                'nama' => 'Strawberry Shortcake',
                'rasa_kategori' => 'Strawberry',
                'harga' => 65000,
                'stock' => 8,
                'foto' => 'strawberry.jpg',
                'deskripsi' => 'Segar dengan potongan strawberry asli'
            ],
            [
                'nama' => 'Black Forest',
                'rasa_kategori' => 'Coklat Ceri',
                'harga' => 75000,
                'stock' => 3,
                'foto' => 'blackforest.jpg',
                'deskripsi' => 'Perpaduan coklat dan ceri yang klasik'
            ],
            [
                'nama' => 'Cheesecake Blueberry',
                'rasa_kategori' => 'Keju',
                'harga' => 70000,
                'stock' => 7,
                'foto' => 'cheesecake.jpg',
                'deskripsi' => 'Lembut dengan saus blueberry homemade'
            ],
        ];

        foreach ($products as $product) {
            Kue::create($product);
        }
    }
}