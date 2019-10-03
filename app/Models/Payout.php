<?php

namespace App\Models;

class Payout
{
    const PAYLINES = [
        [0, 3, 6, 9,  12],
        [1, 4, 7, 10, 13],
        [2, 5, 8, 11, 14],
        [0, 4, 8, 10, 12],
        [2, 4, 6, 10, 14]
    ];

    const BET_PERCENTAGE = [
        3 => 0.2,
        4 => 2,
        5 => 10
    ];

    const MATRIX = [
        0, 5, 10,
        1, 6, 11,
        2, 7, 12,
        3, 8, 13,
        4, 9, 14
    ];

    public static function getPaylines(array $board): array
    {
        $allocatedBoard = [];
        foreach (self::MATRIX as $item) {
            $allocatedBoard[] = $board[$item];
        }

        return [];
    }
}
