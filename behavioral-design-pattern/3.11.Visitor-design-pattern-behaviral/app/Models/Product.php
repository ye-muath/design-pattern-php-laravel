<?php

namespace App\Models;

use App\Interfaces\VisitableInterface;
use App\Interfaces\VisitorInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements VisitableInterface
{
    use HasFactory;

    public $fillable = ['title'];
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitProduct($this);
    }
}
