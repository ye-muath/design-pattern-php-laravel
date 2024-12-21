<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\ProductFlyweight;
use App\Services\ProductFlyweightFactory;

class ProductController extends Controller
{
    public function index()
    {
        $factory = new ProductFlyweightFactory();

        $products = [
            ['name' => 'Laptop', 'category' => 'Electronics', 'brand' => 'Dell', 'price' => 1200],
            ['name' => 'Monitor', 'category' => 'Electronics', 'brand' => 'Dell', 'price' => 300],
            ['name' => 'Headphones', 'category' => 'Electronics', 'brand' => 'Sony', 'price' => 100],
            ['name' => 'Keyboard', 'category' => 'Electronics', 'brand' => 'Logitech', 'price' => 50],
        ];

        $output = [];

        foreach ($products as $product) {
            $flyweight = $factory->getFlyweight($product['category'], $product['brand']);
            $output[] = $flyweight->render($product['name'], $product['price']);
        }
        return response()->json([
            'products' => $output,
            'counter'  => ProductFlyweight::$counter
        ]);
    }
}
