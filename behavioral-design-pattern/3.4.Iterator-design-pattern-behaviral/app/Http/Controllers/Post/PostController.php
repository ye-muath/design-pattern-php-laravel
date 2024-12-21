<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\PostCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    public function index()
    {
        $postCollection = new PostCollection(); // إنشاء كائن المجموعة
        $iterator = $postCollection->getIterator(); // الحصول على المكرِّر

        $postsData = [];
        while ($iterator->hasNext()) { // التنقل عبر المنشورات
            $post = $iterator->next();
            $postsData[] = [
                'title' => $post->title,
                'content' => $post->content,
            ];
        }
       return response()->json($postsData); // إرجاع البيانات كـ JSON
    }
}
