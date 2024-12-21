<?php
namespace App\Services\SubSystem;

class Projector
{
    public function on()
    {
        echo "Projector is on\n";
    }

    public function off()
    {
        echo "Projector is off\n";
    }

    public function setInput($input)
    {
        echo "Projector input set to $input\n";
    }
}
