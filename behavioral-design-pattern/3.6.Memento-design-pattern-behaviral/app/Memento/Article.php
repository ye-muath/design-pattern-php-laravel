<?php

namespace App\Memento;

use App\Memento\Memento;

//Originator
class Article
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    // إنشاء Memento
    public function save(): Memento
    {
        return new Memento($this->content);
    }

    // استرجاع الحالة من Memento
    public function restore(Memento $memento): void
    {
        $this->content = $memento->getState();
    }
}
