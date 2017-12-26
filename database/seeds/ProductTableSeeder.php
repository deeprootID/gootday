<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
          'nama' => 'Air Tshirt Black',
          'stok' => 5,
          'deskripsi' => "Raw denim you probably haven't heard of them jean shorts Austin",
          'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSVJe3RVCrKIK-2wYt3FAu4JG54bThjkKCmOu1jLe-ISKdOiAK',
          'harga' => 15000,
          'harga_diskon' => 10000
        ]);
        $product->save();

        $product = new \App\Product([
          'nama' => 'Air Tshirt Black 1',
          'stok' => 5,
          'deskripsi' => "Raw denim you probably haven't heard of them jean shorts Austin",
          'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSVJe3RVCrKIK-2wYt3FAu4JG54bThjkKCmOu1jLe-ISKdOiAK',
          'harga' => 15000,
          'harga_diskon' => 10000
        ]);
        $product->save();

        $product = new \App\Product([
          'nama' => 'Air Tshirt Black 2',
          'stok' => 5,
          'deskripsi' => "Raw denim you probably haven't heard of them jean shorts Austin",
          'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSVJe3RVCrKIK-2wYt3FAu4JG54bThjkKCmOu1jLe-ISKdOiAK',
          'harga' => 15000,
          'harga_diskon' => 10000
        ]);
        $product->save();

        $product = new \App\Product([
          'nama' => 'Air Tshirt Black 3',
          'stok' => 5,
          'deskripsi' => "Raw denim you probably haven't heard of them jean shorts Austin",
          'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSVJe3RVCrKIK-2wYt3FAu4JG54bThjkKCmOu1jLe-ISKdOiAK',
          'harga' => 15000,
          'harga_diskon' => 10000
        ]);
        $product->save();

        $product = new \App\Product([
          'nama' => 'Air Tshirt Black 4',
          'stok' => 5,
          'deskripsi' => "Raw denim you probably haven't heard of them jean shorts Austin",
          'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSVJe3RVCrKIK-2wYt3FAu4JG54bThjkKCmOu1jLe-ISKdOiAK',
          'harga' => 15000,
          'harga_diskon' => 10000
        ]);
        $product->save();
    }
}
