<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $products = [
            ["name" => "TV", "description" => "Best TV", "image" => "1.png", "price" => "1000"],
            ["name" => "iPhone", "description" => "Best iPhone", "image" => "2.png", "price" => "999"],
            ["name" => "Chromecast", "description" => "Best Chromecast", "image" => "3.png", "price" => "30"],
            ["name" => "Glasses", "description" => "Best Glasses", "image" => "4.png", "price" => "100"]
        ];
        foreach($products as $product)
            Product::Create($product);
    }
}
