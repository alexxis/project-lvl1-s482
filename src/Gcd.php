<?php

namespace BrainGames\Gcd;

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
    return $firstNum * $secondNum;
}

function run()
{
    $attempt = 1;

    line("Welcome to the Brain Games!");
    line("Find the greatest common divisor of given numbers\n");
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name, "\n");

    while ($attempt < 4) {
        $firstNumber = randomNumber();
        $secondNumber = randomNumber();
        $firstNumberAsString = (string) $firstNumber;
        $secondNumberAsString = (string) $secondNumber;
        $expressionAsString = "{$firstNumberAsString} {$secondNumberAsString}";

        line("Question: %s", $expressionAsString);
        $answer = \cli\prompt('Your answer is');
        $isCheckGood = isAnswerCorrect($firstNumber, $secondNumber, $answer);
        $corrAnswer = correctAnswer($firstNumber, $secondNumber);

        if ($isCheckGood === true) {
            line("Question: {$expressionAsString}");
            line("Your answer: {$answer}");
            line("Correct!");
            $attempt += 1;
        } else {
            line("Question: {$expressionAsString}");
            line("Your answer: {$answer}");
            line("'{$answer}' is the wrong answer ;(. The correct answer was '{$corrAnswer}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($attempt > 3) {
        line("Congratulations, %s!", $name);
    }
}
