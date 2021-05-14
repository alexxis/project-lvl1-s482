<?php

namespace Project\Lvl1\S482\Generator;

function isAnswerCorrectForEven($game, $number, $answer)
{
    switch ($game) {
        case "even":
            if ($number % 2 === 0) {
                $correctAnswer = 'yes';
            } else {
                $correctAnswer = 'no';
            }

            if ($answer === $correctAnswer) {
                return true;
            } else {
                return false;
            }

            break;
        default:
            echo "Uknown game for the Generator";
    }
}

function isAnswerCorrectForCalc($act, $firstNum, $secondNum, $answ)
{
    $correctAnswer = (string) correctAnswerForCalc($act, $firstNum, $secondNum);

    if ($answ === $correctAnswer) {
        return true;
    } else {
        return false;
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

function correctAnswerForCalc($act, $firstNum, $secondNum)
{
    if ($act === '+') {
        return $firstNum + $secondNum;
    } elseif ($act === '-') {
        return $firstNum - $secondNum;
    }
    return $firstNum * $secondNum;
}
