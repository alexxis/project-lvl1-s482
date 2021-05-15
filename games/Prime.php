<?php

namespace BrainGames\Prime;

use function Project\Lvl1\S482\Engine\play;

function isAnswerCorrect($num, $answ)
{
    if ($answ === correctAnswer($num)) {
        return true;
    } else {
        return false;
    }
}

function correctAnswer($num)
{
    for ($i = 2; $i < ceil(sqrt($num)); $i++) {
        if ($num % $i == 0) {
            return "no";
        }
    }

    return "yes";
}

function run()
{
    play('prime');
}
