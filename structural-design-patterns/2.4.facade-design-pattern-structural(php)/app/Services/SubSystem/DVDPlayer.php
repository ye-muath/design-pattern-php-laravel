<?php
namespace App\Services\SubSystem;

class DVDPlayer
{
    public function on()
    {
        echo "DVD Player is on\n";
    }

    public function play($movie)
    {
        echo "Playing movie: $movie\n";
    }

    public function off()
    {
        echo "DVD Player is off\n";
    }
}

