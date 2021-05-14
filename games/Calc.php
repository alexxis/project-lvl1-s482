<?php

namespace BrainGames\Calc;

use function Project\Lvl1\S482\Engine\play;

function randomAction()
{
    $actions = ['+', '-', '*'];

    return $actions[random_int(0, 2)];
}

function isAnswerCorrect($act, $firstNum, $secondNum, $answ)
{
    $correctAnswer = (string) correctAnswer($act, $firstNum, $secondNum);

    if ($answ === $correctAnswer) {
        return true;
    } else {
        return false;
    }
}

function correctAnswer($act, $firstNum, $secondNum)
{
    if ($act === '+') {
        return $firstNum + $secondNum;
    } elseif ($act === '-') {
        return $firstNum - $secondNum;
    }
    return $firstNum * $secondNum;
}

function run()
{
    play('calc');
}
