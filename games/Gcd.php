<?php

namespace BrainGames\Gcd;

use function Project\Lvl1\S482\Engine\play;

function randomNumber()
{
    return random_int(-100, 100);
}

function randomAction()
{
    $actions = ['+', '-', '*'];

    return $actions[random_int(0, 2)];
}

function isAnswerCorrect($firstNum, $secondNum, $answ)
{
    $correctAnswer = (string) correctAnswer($firstNum, $secondNum);

    if ($answ === $correctAnswer) {
        return true;
    } else {
        return false;
    }
}

function correctAnswer($firstNum, $secondNum)
{
    // TODO Binary GCD algorithm here
    $positiveFirstNumber = abs($firstNum);
    $positiveSecondNumber = abs($secondNum);

    if ($positiveFirstNumber === 0) {
        return $positiveSecondNumber;
    } elseif ($positiveSecondNumber === 0) {
        return $positiveFirstNumber;
    }

    while ($positiveFirstNumber != $positiveSecondNumber) {
        if ($positiveFirstNumber > $positiveSecondNumber) {
            $positiveFirstNumber -= $positiveSecondNumber;
        } else {
            $positiveSecondNumber -= $positiveFirstNumber;
        }
    }

    return $positiveFirstNumber;
}

function run()
{
    play('gcd');
}
