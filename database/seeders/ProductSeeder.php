<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Product::create([
        'image'=> 'images/cloth_1.jpg',
        'name' =>'urun 1',
        'category_id'=> 1,
        'short_text'=>'Kısa Bilgi',
        'price'=> 100,
        'size'=>'Small',
        'color'=>'Beyaz',
        'qty'=>10,
        'status'=>'1',
        'content'=>'<p> Ürün tercih edilebilir </p>'
       ]);
       Product::create([
        'image'=> 'images/cloth_1.jpg',
        'name' =>'urun 2',
        'category_id'=> 2,
        'short_text'=>'Kısa Bilgi',
        'price'=> 200,
        'size'=>'XL',
        'color'=>'Siyah',
        'qty'=>10,
        'status'=>'1',
        'content'=>'<p> Ürün tercih edilebilir </p>'
       ]);       Product::create([
        'image'=> 'images/cloth_1.jpg',
        'name' =>'urun 3',
        'category_id'=> 3,
        'short_text'=>'Kısa Bilgi',
        'price'=> 300,
        'size'=>'Large',
        'color'=>'Beyaz',
        'qty'=>10,
        'status'=>'1',
        'content'=>'<p> Ürün tercih edilebilir </p>'
       ]);
    }
}
