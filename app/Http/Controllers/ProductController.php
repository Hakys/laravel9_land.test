<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        //$viewData["products"] = ProductController::$products;
        $viewData["products"] = Product::all()->take(100);
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        //$product = ProductController::$products[$id - 1];
        
        $product = Product::findOrFail($id);
        //$viewData["title"] = $product["name"] . " - Online Store";
        //$viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["title"] = $product->getTitle()." - Online Store";
        $viewData["subtitle"] = $product->getTitle()." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}
