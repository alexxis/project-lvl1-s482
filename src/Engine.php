<?php

namespace Project\Lvl1\S482\Engine;

use function cli\line;

function play($game)
{
    switch ($game) {
        case "even":
            $attempt = 1;

            line("Welcome to the Brain Games!");
            line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
            $name = \cli\prompt('May I have your name?');
            line("Hello, %s!", $name);

            while ($attempt < 4) {
                $number = random_int(-1000, 1000);
                $numberAsString = (string) $number;

                line("Question: %s", $numberAsString);
                $answer = \cli\prompt('Your answer is');
                $checkAnswer = \Project\Lvl1\S482\Generator\isAnswerCorrect($game, $number, $answer);

                if ($checkAnswer === true) {
                    line("Correct!");
                    $attempt += 1;
                } else {
                    line("'yes' is the wrong answer ;(. The correct answer was 'no'.");
                    line("Let's try again, %s!", $name);
                    break;
                }
            }

            if ($attempt > 3) {
                line("Congratulations, %s!", $name);
            }

            break;
        case "calc":
            echo "Good choice!";
            break;
        case "gcd":
            echo "Bad choice!";
            break;
        case "progression":
            echo "progr";
            break;
        case "prime":
            echo "prime";
            break;
        default:
            echo "Uknown game!";
    }
}
