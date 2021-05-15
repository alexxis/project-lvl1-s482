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

function correctAnswerForGcd($firstNum, $secondNum)
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

function isAnswerCorrectForGcd($firstNum, $secondNum, $answ)
{
    $correctAnswer = (string) correctAnswerForGcd($firstNum, $secondNum);

    if ($answ === $correctAnswer) {
        return true;
    } else {
        return false;
    }
}
