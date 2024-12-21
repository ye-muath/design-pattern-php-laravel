<?php

namespace App\Models;

use App\Prototypes\Prototype;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Prototype
{
    protected $fillable = ['name', 'description', 'price'];

    public function clone(): Prototype
    {
        return new self($this->toArray());
    }
}
