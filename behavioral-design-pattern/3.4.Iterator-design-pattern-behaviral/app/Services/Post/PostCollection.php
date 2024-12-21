<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Services\Post\PostCollectionIterator;
use Illuminate\Support\Collection;

class PostCollection
{
    private Collection $posts;

    public function __construct()
    {
        $this->posts = Post::all(); // استرجاع جميع المنشورات من قاعدة البيانات
    }

    public function getIterator(): PostCollectionIterator
    {
        return new PostCollectionIterator($this->posts); // إنشاء مكرِّر للمجموعة
    }
}
