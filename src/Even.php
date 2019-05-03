<?php

namespace BrainGames\Even;

use function \cli\line;

function randomNumber()
{
    return random_int(-1000, 1000);
}

function isAnswerCorrect($num, $answ)
{
    if ($num % 2 === 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
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
    line("Answer \"yes\" if number even otherwise answer \"no\".\n");
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);

    while ($attempt < 4) {
        $number = randomNumber();
        $numberAsString = (string) $number;

        line("Question: %s", $numberAsString);
        $answer = \cli\prompt('Your answer');
        $checkAnswer = isAnswerCorrect($number, $answer);

        if ($checkAnswer === true) {
            line("Correct!");
            $attempt += 1;
        } else {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, %s!", $name);
            break;
        }

    }

    line("Congratulations, %s!", $name);
}
