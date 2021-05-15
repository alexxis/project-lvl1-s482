<?php

namespace Project\Lvl1\S482\Engine;

use function cli\line;
use function Project\Lvl1\S482\Generator\correctAnswerForCalc;
use function Project\Lvl1\S482\Generator\isAnswerCorrectForCalc;
use function Project\Lvl1\S482\Generator\isAnswerCorrectForEven;
use function Project\Lvl1\S482\Generator\randomAction;

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
                $checkAnswer = isAnswerCorrectForEven($game, $number, $answer);

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
            $attempt = 1;

            line("Welcome to the Brain Games!");
            line("What is the result of the expression?\n");
            $name = \cli\prompt('May I have your name?');
            line("Hello, %s!", $name, "\n");

            while ($attempt < 4) {
                $firstNumber = random_int(-100, 100);
                $secondNumber = random_int(-100, 100);
                $action = randomAction('calc');
                $firstNumberAsString = (string) $firstNumber;
                $secondNumberAsString = (string) $secondNumber;
                $expressionAsString = "{$firstNumberAsString} {$action} {$secondNumberAsString}";

                line("Question: %s", $expressionAsString);
                $answer = \cli\prompt('Your answer is');
                $isCheckGood = isAnswerCorrectForCalc($action, $firstNumber, $secondNumber, $answer);
                $corrAnswer = correctAnswerForCalc($action, $firstNumber, $secondNumber);

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

            break;
        case "gcd":
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
