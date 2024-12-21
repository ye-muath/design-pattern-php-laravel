<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createAndCloneStoreDb() {
        // Create a new product
        $originalProduct =  Product::create([
            'name' => 'Original Product',
            'description' => 'This is the original product.',
            'price' => 100,
        ]);

        // Clone the product
        $clonedProduct = $originalProduct->clone();

        // Modify the cloned product
        $clonedProduct->name = 'Cloned Product';
        $clonedProduct->save();

        // Output the original and cloned products
       return  [$originalProduct, $clonedProduct];
    }

    public function createAndCloneOnly() {
        // Create a new product
        $originalProduct =  Product::create([
            'name' => 'Original Product',
            'description' => 'This is the original product.',
            'price' => 100,
        ]);

        // Clone the product
        $clonedProduct = clone $originalProduct;

        // Modify the cloned product
        $clonedProduct->name = 'Cloned Product';
        $clonedProduct->save();

        // Output the original and cloned products
       return  [$originalProduct, $clonedProduct];
    }
}
