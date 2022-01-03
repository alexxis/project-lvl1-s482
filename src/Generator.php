<?php

namespace Project\Lvl1\S482\Generator;

use function cli\line;

function greeting($game)
{
    switch ($game) {
        case "even":
            line("Welcome to the Brain Games!");
            line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
            break;
        case "calc":
            line("Welcome to the Brain Games!");
            line("What is the result of the expression?\n");
            break;
        case "gcd":
            line("Welcome to the Brain Games!");
            line("Find the greatest common divisor of given numbers\n");
            break;
        case "progression":
            line("Welcome to the Brain Games!");
            line("What the number is missing in the progression?\n");
            break;
        case "prime":
            line("Welcome to the Brain Games!");
            line("Answer \"yes\" if the given number is prime. Otherwise answer \"no\".\n");
            break;
        default:
            echo "Uknown name for greeting!";
    }
}

function randomAction($game)
{
    switch ($game) {
        case "calc":
            $actions = ['+', '-', '*'];

            return $actions[random_int(0, 2)];
            break;
        default:
            echo "Uknown game for the Generator";
    }
}

function initProgression($startNum, $st)
{
    $arrProgression = [];
    $arrProgression[0] = $startNum;

    for ($i = 1; $i < 10; $i++) {
        $arrProgression[$i] = $arrProgression[$i - 1] + $st;
    }

    return $arrProgression;
}

function insertHiddenElementIntoArray($arr, $place)
{
    $arrayForQuestion = $arr;
    $arrayForQuestion[$place] = '..';

    return $arrayForQuestion;
}
