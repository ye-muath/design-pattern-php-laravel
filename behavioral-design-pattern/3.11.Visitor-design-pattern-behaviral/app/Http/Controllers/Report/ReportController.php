<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Visitors\ReportVisitor;

class ReportController extends Controller
{
    public function generateReport()
    {
        $items = [
            new User([
                'name'    => 'أحمد',
                'email'   => 'a@gmail.com'
            ]),
            new Product([
                'title'   => 'حاسوب محمول'
            ]),
            new User([
                'name'    => 'فاطمة',
                'email'   => 'f@gmail.com'
            ]),
            new Product([
                'title'   => 'هاتف ذكي'
            ])
        ];

        $visitor = new ReportVisitor();

        foreach ($items as $item) {
            $item->accept($visitor);
        }
    }
}
