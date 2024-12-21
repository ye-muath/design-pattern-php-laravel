<?php

namespace App\Services\SubSystem;

class SurroundSoundSystem
{
    public function on()
    {
        echo "Surround Sound System is on\n";
    }

    public function setVolume($level)
    {
        echo "Sound system volume set to $level\n";
    }

    public function off()
    {
        echo "Surround Sound System is off\n";
    }
}
