<?php

namespace App\Models;

class Board
{
    const SIZE = 15;

    public static function getRandom()
    {
        $max = Symbol::getLastKey();
        $board = [];
        for ($i=0; $i<self::SIZE; $i++) {
            $board[$i] = random_int(0, $max);
        }

        return $board;
    }
}
