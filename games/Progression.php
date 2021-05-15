<?php

namespace BrainGames\Progression;

use function Project\Lvl1\S482\Engine\play;

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
    play('progression');
}
