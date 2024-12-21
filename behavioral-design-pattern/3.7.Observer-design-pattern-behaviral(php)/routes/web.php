<?php

use Illuminate\Support\Facades\Route;
use App\Observers\Product;
use App\Observers\User;
// الكود الرئيسي (اختبار النمط)

// إنشاء الموضوع
$product = new Product();

// إنشاء مراقبين (مستخدمين)
$user1 = new User("أحمد");
$user2 = new User("فاطمة");

// ربط المراقبين مع الموضوع
$product->attach($user1);
$product->attach($user2);

// تغيير حالة المنتج
$product->setState("متاح في المخزن");

// إزالة مراقب
$product->detach($user1);

// تغيير الحالة مرة أخرى
$product->setState("غير متوفر حاليًا");

