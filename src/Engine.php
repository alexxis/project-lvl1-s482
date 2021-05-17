<?php

namespace Project\Lvl1\S482\Engine;

use function cli\line;
use function Project\Lvl1\S482\Generator\correctAnswer;
use function Project\Lvl1\S482\Generator\greeting;
use function Project\Lvl1\S482\Generator\initProgression;
use function Project\Lvl1\S482\Generator\insertHiddenElementIntoArray;
use function Project\Lvl1\S482\Generator\isAnswerCorrect;
use function Project\Lvl1\S482\Generator\randomAction;

function play($game)
{
    switch ($game) {
        case "even":
            $attempt = 1;

            greeting($game);
            $name = \cli\prompt('May I have your name?');
            line("Hello, %s!", $name);

            while ($attempt < 4) {
                $number = random_int(-1000, 1000);
                $numberAsString = (string) $number;

                line("Question: %s", $numberAsString);
                $answer = \cli\prompt('Your answer is');
                $checkAnswer = isAnswerCorrect($game, $number, $answer);

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

            greeting($game);
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
                $isCheckGood = isAnswerCorrect($game, $action, $firstNumber, $secondNumber, $answer);
                $corrAnswer = correctAnswer($game, $action, $firstNumber, $secondNumber);

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

            greeting($game);
            $name = \cli\prompt('May I have your name?');
            line("Hello, %s!", $name, "\n");

            while ($attempt < 4) {
                $firstNumber = random_int(-100, 100);
                $secondNumber = random_int(-100, 100);
                $firstNumberAsString = (string) $firstNumber;
                $secondNumberAsString = (string) $secondNumber;
                $expressionAsString = "{$firstNumberAsString} {$secondNumberAsString}";

                line("Question: %s", $expressionAsString);
                $answer = \cli\prompt('Your answer is');
                $isCheckGood = isAnswerCorrect($game, $firstNumber, $secondNumber, $answer);
                $corrAnswer = correctAnswer($game, $firstNumber, $secondNumber);

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
            $attempt = 1;

            greeting($game);
            $name = \cli\prompt('May I have your name?');
            line("Hello, %s!", $name, "\n");

            while ($attempt < 4) {
                $firstNumber = random_int(-100, 100);
                $step = random_int(0, 100);
                $sourceProgression = initProgression($firstNumber, $step);
                $hiddenArrayElement = random_int(0, 9);
                $finalArray = insertHiddenElementIntoArray($sourceProgression, $hiddenArrayElement);
                $arrayAsString = implode(" ", $finalArray);
                $expressionAsString = "{$arrayAsString}";

                line("Question: %s", $expressionAsString);
                $answer = \cli\prompt('Your answer is');
                $isCheckGood = isAnswerCorrect($game, $sourceProgression, $hiddenArrayElement, $answer);
                $corrAnswer = correctAnswer($game, $sourceProgression, $hiddenArrayElement);

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
        case "prime":
            $attempt = 1;

            greeting($game);
            $name = \cli\prompt('May I have your name?');
            line("Hello, %s!", $name, "\n");

            while ($attempt < 4) {
                $firstNumber = random_int(1, 500);
                $expressionAsString = "{$firstNumber}";

                line("Question: %s", $expressionAsString);
                $answer = \cli\prompt('Your answer is');
                $isCheckGood = isAnswerCorrect($game, $firstNumber, $answer);
                $corrAnswer = correctAnswer($game, $firstNumber);

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
        default:
            echo "Uknown game!";
    }
}
