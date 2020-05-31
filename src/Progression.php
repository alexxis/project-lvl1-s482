<?php

namespace BrainGames\Progression;

use function cli\line;

function randomNumber()
{
    return random_int(-100, 100);
}

function randomStep()
{
    return random_int(0, 100);
}

function randomArrayElementPosition()
{
    return random_int(0, 9);
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

function isAnswerCorrect($srcProgression, $hiddArrElement, $answ)
{
    if ($answ === (string) $srcProgression[$hiddArrElement]) {
        return true;
    } else {
        return false;
    }
}

function correctAnswer($srcProgression, $hiddArrElement)
{
    $corrAnsw = (string) $srcProgression[$hiddArrElement];

    return $corrAnsw;
}

function run()
{
    $attempt = 1;

    line("Welcome to the Brain Games!");
    line("What the number is missing in the progression?\n");
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name, "\n");

    while ($attempt < 4) {
        $firstNumber = randomNumber();
        $step = randomStep();
        $sourceProgression = initProgression($firstNumber, $step);
        $hiddenArrayElement = randomArrayElementPosition();
        $finalArray = insertHiddenElementIntoArray($sourceProgression, $hiddenArrayElement);
        $arrayAsString = implode(" ", $finalArray);
        $expressionAsString = "{$arrayAsString}";

        line("Question: %s", $expressionAsString);
        $answer = \cli\prompt('Your answer is');
        $isCheckGood = isAnswerCorrect($sourceProgression, $hiddenArrayElement, $answer);
        $corrAnswer = correctAnswer($sourceProgression, $hiddenArrayElement);

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
