<?php

namespace App\Services;

use App\Services\SubSystem\DVDPlayer;
use App\Services\SubSystem\Projector;
use App\Services\SubSystem\Lights;
use App\Services\SubSystem\SurroundSoundSystem;

class HomeTheaterFacade
{
    private $dvdPlayer;
    private $projector;
    private $lights;
    private $soundSystem;

    public function __construct(DVDPlayer $dvdPlayer, Projector $projector, Lights $lights, SurroundSoundSystem $soundSystem)
    {
        $this->dvdPlayer = $dvdPlayer;
        $this->projector = $projector;
        $this->lights = $lights;
        $this->soundSystem = $soundSystem;
    }

    public function watchMovie($movie)
    {
        echo "Get ready to watch a movie...\n";
        $this->lights->dim(10);
        $this->projector->on();
        $this->projector->setInput("DVD Player");
        $this->soundSystem->on();
        $this->soundSystem->setVolume(5);
        $this->dvdPlayer->on();
        $this->dvdPlayer->play($movie);
    }

    public function endMovie()
    {
        echo "Shutting down the home theater...\n";
        $this->dvdPlayer->off();
        $this->soundSystem->off();
        $this->projector->off();
        $this->lights->dim(100);
    }
}
