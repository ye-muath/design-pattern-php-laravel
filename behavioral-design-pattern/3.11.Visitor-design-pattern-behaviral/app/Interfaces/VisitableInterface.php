<?php
namespace App\Interfaces;

interface VisitableInterface
{
    public function accept(VisitorInterface $visitor);
}
