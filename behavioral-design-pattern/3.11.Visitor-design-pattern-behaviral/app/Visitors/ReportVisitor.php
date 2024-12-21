<?php

namespace App\Visitors;

use App\Interfaces\VisitorInterface;
use App\Models\Product;
use App\Models\User;

class ReportVisitor implements VisitorInterface
{
    public function visitUser(User $user)
    {
        echo "تقرير المستخدم: {$user->name} \n";
    }

    public function visitProduct(Product $product)
    {
        echo "تقرير المنتج: {$product->title} \n";
    }
}
