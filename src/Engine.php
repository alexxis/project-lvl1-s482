<?php

namespace Project\Lvl1\S482\Engine;

use function cli\line;
use function Project\Lvl1\S482\Generator\greeting;
use function Project\Lvl1\S482\Generator\initProgression;
use function Project\Lvl1\S482\Generator\insertHiddenElementIntoArray;
use function Project\Lvl1\S482\Generator\randomAction;

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
