<?php

use App\Services\AndExpression;
use App\Services\CategoryExpression;
use App\Services\PriceExpression;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {


                //"price > 100 AND category = 'electronics'"
                
                $priceExpr = new PriceExpression(100);
                $categoryExpr = new CategoryExpression('electronics');

                // جمع التعبيرات باستخدام AND
                $andExpr = new AndExpression($priceExpr, $categoryExpr);

                $query = Product::query();
                $result = $andExpr->interpret($query)->get();

                return ($result);

});
