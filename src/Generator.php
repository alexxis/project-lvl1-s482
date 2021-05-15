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

function isAnswerCorrectForProgression($srcProgression, $hiddArrElement, $answ)
{
    if ($answ === (string) $srcProgression[$hiddArrElement]) {
        return true;
    } else {
        return false;
    }
}

function correctAnswerForProgression($srcProgression, $hiddArrElement)
{
    $corrAnsw = (string) $srcProgression[$hiddArrElement];

    return $corrAnsw;
}

function correctAnswerForPrime($num)
{
    for ($i = 2; $i < ceil(sqrt($num)); $i++) {
        if ($num % $i == 0) {
            return "no";
        }
    }

    return "yes";
}

function isAnswerCorrectForPrime($num, $answ)
{
    if ($answ === correctAnswerForPrime($num)) {
        return true;
    } else {
        return false;
    }
}
