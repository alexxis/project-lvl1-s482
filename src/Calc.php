<?php

namespace BrainGames\Calc;

use function cli\line;

function randomNumber()
{
    return random_int(-100, 100);
}

function randomAction()
{
    $actions = ['+', '-', '*'];

    return $actions[random_int(0, 2)];
}

function isAnswerCorrect($firstNum, $secondNum, $act, $answ)
{
    if ($act === '+') {
        $correctAnswer = $firstNum + $secondNum;
    } elseif ($act === '-') {
        $correctAnswer = $firstNum - $secondNum;
    } elseif ($act === '*') {
        $correctAnswer = $firstNum * $secondNum;
    }

    if ($answ === $correctAnswer) {
        return true;
    } else {
        return false;
    }
}

function run()
{
    $attempt = 1;

    line("Welcome to the Brain Games!");
    line("What is the result of the expression?\n");
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);

    while ($attempt < 4) {
        $firstNumber = randomNumber();
        $secondNumber = randomNumber();
        $action = randomAction();
        $firstNumberAsString = (string) $firstNumber;
        $secondNumberAsString = (string) $secondNumber;
        $expressionAsString = "{$firstNumberAsString} {$action} {$secondNumberAsString}";

        line("Question: %s", $expressionAsString);
        $answer = \cli\prompt('Your answer is');
        $checkAnswer = isAnswerCorrect($firstNumber, $secondNumber, $action, $answer);

        if ($checkAnswer === true) {
            line("Question:");
            line("Your answer:");
            line("Correct!");
            $attempt += 1;
        } else {
            line("Question:");
            line("Your answer:");
            line("'yes' is the wrong answer ;(. The correct answer was 'no'.");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    line("Congratulations, %s!", $name);
}
