<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showTree()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('categories.tree', compact('categories'));
    }
}
