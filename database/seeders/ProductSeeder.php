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
            ["referencia" => "DR-0001", "title" => "TV", "slug" => "TV", "html_description" => "Best TV", "url_image" => "1.png", "price" => "1000"],
            ["referencia" => "DR-0002", "title" => "iPhone", "slug" => "iPhone", "html_description" => "Best iPhone", "url_image" => "2.png", "price" => "999"],
            ["referencia" => "DR-0003", "title" => "Chromecast", "slug" => "Chromecast", "html_description" => "Best Chromecast", "url_image" => "3.png", "price" => "30"],
            ["referencia" => "DR-0004", "title" => "Glasses", "slug" => "Glasses", "html_description" => "Best Glasses", "url_image" => "4.png", "price" => "100"]
        ];
        foreach($products as $product)
            Product::Create($product);
    }
}
