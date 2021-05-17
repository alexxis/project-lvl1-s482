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

function correctAnswer($game, ...$items)
{
    switch ($game) {
        case "even":
            echo "";
            break;
        case "calc":
            [$act, $firstNum, $secondNum] = $items;

            if ($act === '+') {
                return $firstNum + $secondNum;
            } elseif ($act === '-') {
                return $firstNum - $secondNum;
            }

            return $firstNum * $secondNum;

            break;
        case "gcd":
            [$firstNum, $secondNum] = $items;
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

            break;
        case "progression":
            [$srcProgression, $hiddArrElement] = $items;
            $corrAnsw = (string) $srcProgression[$hiddArrElement];

            return $corrAnsw;

            break;
        case "prime":
            [$num] = $items;

            for ($i = 2; $i < ceil(sqrt($num)); $i++) {
                if ($num % $i == 0) {
                    return "no";
                }
            }

            return "yes";

        default:
            echo "Uknown game for Generator";
    }
}

function isAnswerCorrect($game, ...$items)
{
    switch ($game) {
        case "even":
            [$number, $answer] = $items;

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
        case "calc":
            [$act, $firstNum, $secondNum, $answ] = $items;
            $correctAnswer = (string) correctAnswer($game, $act, $firstNum, $secondNum);

            if ($answ === $correctAnswer) {
                return true;
            } else {
                return false;
            }

            break;
        case "gcd":
            [$firstNum, $secondNum, $answ] = $items;
            $correctAnswer = (string) correctAnswer($game, $firstNum, $secondNum);

            if ($answ === $correctAnswer) {
                return true;
            } else {
                return false;
            }

            break;
        case "progression":
            [$srcProgression, $hiddArrElement, $answ] = $items;

            if ($answ === (string) $srcProgression[$hiddArrElement]) {
                return true;
            } else {
                return false;
            }

            break;
        case "prime":
            [$num, $answ] = $items;

            if ($answ === correctAnswer($game, $num)) {
                return true;
            } else {
                return false;
            }

            break;
        default:
            echo "Uknown game for Generator";
    }
}
