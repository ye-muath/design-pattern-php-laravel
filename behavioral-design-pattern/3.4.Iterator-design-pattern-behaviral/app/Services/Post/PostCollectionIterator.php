<?php

namespace App\Services\Post;

use App\Services\Post\PostIteratorInterface;
use Illuminate\Support\Collection;

class PostCollectionIterator implements PostIteratorInterface
{
    private Collection $posts; // مجموعة المنشورات
    private int $currentIndex = 0; // المؤشر الحالي

    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    public function hasNext(): bool
    {
        return $this->currentIndex < $this->posts->count(); // التحقق من وجود عنصر تالي
    }

    public function next(): ?object
    {
        if (!$this->hasNext()) {
            return null; // لا يوجد عنصر تالي
        }

        $data =  $this->posts[$this->currentIndex]; // إرجاع العنصر الحالي وتحريك المؤشر
        $this->currentIndex +=2;
        return $data;
    }
}
