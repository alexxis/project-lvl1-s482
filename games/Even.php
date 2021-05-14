<?php

namespace BrainGames\Even;

use function cli\line;
use function Project\Lvl1\S482\Engine\play;

function run()
{
    line("Welcome to the Brain Games!");
    play('even');
}
