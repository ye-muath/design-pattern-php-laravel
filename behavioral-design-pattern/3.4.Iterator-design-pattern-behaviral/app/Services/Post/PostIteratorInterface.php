<?php

namespace App\Services\Post;

interface PostIteratorInterface
{
    public function hasNext(): bool; // التحقق مما إذا كان هناك عنصر تالي
    public function next(): ?object; // استرجاع العنصر الحالي والتحرك إلى العنصر التالي
}
