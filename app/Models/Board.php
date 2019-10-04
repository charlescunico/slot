<?php

namespace App\Models;

class Board
{
    const COLUMNS = 5;

    const ROWS = 3;

    public static function getRandom(): array
    {
        $max = Symbol::getLastKey();
        $size = self::COLUMNS * self::ROWS;
        $board = [];
        for ($i=0; $i<$size; $i++) {
            $board[$i] = random_int(0, $max);
        }

        return $board;
    }
}
