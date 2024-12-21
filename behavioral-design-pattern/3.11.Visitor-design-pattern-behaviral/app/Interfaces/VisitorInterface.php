<?php

namespace App\Interfaces;

use App\Models\Product;
use App\Models\User;

interface VisitorInterface
{
    public function visitUser(User $user);
    public function visitProduct(Product $product);
}
