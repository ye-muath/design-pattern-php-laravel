<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'id'     => 1,
            'name'   => 'first',
            'status' => 'new'
        ]);
        Order::create([
            'id'     => 2,
            'name'   => 'second',
            'status' => 'new'
        ]);
        Order::create([
            'id'     => 3,
            'name'   => 'three',
            'status' => 'new'
        ]);
    }
}
