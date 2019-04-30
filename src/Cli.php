<?php

namespace BrainGames\Cli;

# require __DIR__ . '/../vendor/autoload.php';

use function \cli\line;

function run()
{
    line("Welcome to the Brain Games!");
    
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
}
