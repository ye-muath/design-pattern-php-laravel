<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $electronics = Category::create(['name' => 'Electronics']);
        $laptops = Category::create(['name' => 'Laptops', 'parent_id' => $electronics->id]);
        $mobiles = Category::create(['name' => 'Mobiles', 'parent_id' => $electronics->id]);

        Category::create(['name' => 'Gaming Laptops', 'parent_id' => $laptops->id]);
        Category::create(['name' => 'Business Laptops', 'parent_id' => $laptops->id]);

        Category::create(['name' => 'Smartphones', 'parent_id' => $mobiles->id]);
        Category::create(['name' => 'Feature Phones', 'parent_id' => $mobiles->id]);
    }
}
