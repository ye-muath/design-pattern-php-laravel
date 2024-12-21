<?php

namespace App\Memento;

use App\Memento\Memento;

class Caretaker
{
    private array $history = [];

    public function addMemento(Memento $memento): void
    {
        $this->history[] = $memento;
    }

    public function getMemento(int $index): ?Memento
    {
        return $this->history[$index] ?? null;
    }
}
