<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Memento\Article;
use App\Memento\Caretaker;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $article = new Article("هذا هو النص الأساسي");
        $caretaker = new Caretaker();

        // حفظ النسخة الأولى
        $caretaker->addMemento($article->save());

        // تحديث المقالة
        $article->setContent("هذا هو النص بعد التعديل الأول");
        $caretaker->addMemento($article->save());

        // تحديث المقالة مرة أخرى
        $article->setContent("هذا هو النص بعد التعديل الثاني");

        // عرض المحتوى الحالي
        echo "الحالة الحالية: " . $article->getContent() . "<br>";

        // استرجاع الحالة السابقة
        $article->restore($caretaker->getMemento(1));
        echo "بعد الاسترجاع إلى التعديل الأول: " . $article->getContent() . "<br>";

        // استرجاع الحالة الأساسية
        $article->restore($caretaker->getMemento(0));
        echo "بعد الاسترجاع إلى النص الأساسي: " . $article->getContent();
    }
}

