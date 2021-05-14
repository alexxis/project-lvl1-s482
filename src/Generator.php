<?php

namespace Project\Lvl1\S482\Generator;

function isAnswerCorrect($game, $number, $answer)
{
    switch($game)
    {
        case "even":
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
        default:
            echo "Uknown game for the Generator";
    }
}
