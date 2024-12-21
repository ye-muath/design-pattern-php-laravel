<?php

namespace App\Services;

class LoggerService
{
    public function log(string $message): void
    {
        // Logic to log messages
        echo "Log entry: $message\n";
    }
}
