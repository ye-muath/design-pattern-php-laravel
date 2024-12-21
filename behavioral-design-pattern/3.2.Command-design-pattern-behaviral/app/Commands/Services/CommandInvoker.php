<?php

namespace App\Commands\Services;

use App\Commands\Interfaces\CommandInterface;

class CommandInvoker
{
    private $commands = [];

    public function addCommand(CommandInterface $command)
    {
        $this->commands[] = $command;
    }

    public function executeCommands()
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }

        // Clear commands after execution
        $this->commands = [];
    }
}
