<?php

namespace BrainGames\Prime;

use function cli\line;

function randomNumber()
{
    return random_int(1, 500);
}

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
    $attempt = 1;

    line("Welcome to the Brain Games!");
    line("Answer \"yes\" if the given number is prime. Otherwise answer \"no\".\n");
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name, "\n");

    while ($attempt < 4) {
        $firstNumber = randomNumber();
        $expressionAsString = "{$firstNumber}";

        line("Question: %s", $expressionAsString);
        $answer = \cli\prompt('Your answer is');
        $isCheckGood = isAnswerCorrect($firstNumber, $answer);
        $corrAnswer = correctAnswer($firstNumber);

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
