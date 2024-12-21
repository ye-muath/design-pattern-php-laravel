<?php

use App\Services\SubSystem\DVDPlayer;
use Illuminate\Support\Facades\Route;
use App\Services\SubSystem\Projector;
use App\Services\SubSystem\Lights;
use App\Services\SubSystem\SurroundSoundSystem;
use App\Services\HomeTheaterFacade;

Route::get('/', function () {

    // Create subsystem components
    $dvdPlayer = new DVDPlayer();
    $projector = new Projector();
    $lights = new Lights();
    $soundSystem = new SurroundSoundSystem();

    // Create the facade
    $homeTheater = new HomeTheaterFacade($dvdPlayer, $projector, $lights, $soundSystem);

    // Watch a movie
    $homeTheater->watchMovie("Inception");

    // End the movie
    $homeTheater->endMovie();

});
