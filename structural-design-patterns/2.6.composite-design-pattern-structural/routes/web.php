<?php

use Illuminate\Support\Facades\Route;

use App\Services\Category;
use App\Services\CategoryGroup;

$electronics = new CategoryGroup('Electronics');
$phones = new CategoryGroup('Phones');
$laptops = new CategoryGroup('Laptops');

$iphone = new Category('iPhone');
$samsung = new Category('Samsung');
$macbook = new Category('MacBook');
$dell = new Category('Dell');

$phones->add($iphone);
$phones->add($samsung);
$laptops->add($macbook);
$laptops->add($dell);

$electronics->add($phones);
$electronics->add($laptops);

// Render the category hierarchy
dd($electronics->render());

