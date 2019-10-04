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

    const BET_VALUE = 100;

    public static function getPaylines(array $board): array
    {
        $board = self::getAllocatedBoard($board);
        $resultingPaylines = [];
        foreach (self::PAYLINES as $payline) {
            $validSequence = self::getValidSequence($payline, $board);
            if (array_key_exists($validSequence, self::BET_PERCENTAGE)) {
                $resultingPaylines[] = [implode(' ', $payline) => $validSequence];
            }
        }

        return $resultingPaylines;
    }

    public static function getTotalWin(array $resultingPaylines): int
    {
        $totalWin = 0;
        foreach ($resultingPaylines as $payline) {
            foreach ($payline as $key) {
                $totalWin += self::BET_VALUE * self::BET_PERCENTAGE[$key];
            }
        }

        return $totalWin;
    }

    private static function getAllocatedBoard(array $board): array
    {
        $allocatedBoard = [];
        for ($column=0; $column<Board::COLUMNS; $column++) {
            for ($row=0; $row<Board::ROWS; $row++) {
                $allocatedBoard[] = $board[$row * Board::COLUMNS + $column];
            }
        }

        return $allocatedBoard;
    }

    private static function getValidSequence(array $payline, array $board): int
    {
        $currentSymbol = '';
        $validSequence = 0;
        foreach ($payline as $position) {
            if (!$currentSymbol) {
                $currentSymbol = $board[$position];
                $validSequence++;
                continue;
            }
            if ($currentSymbol == $board[$position]) {
                $validSequence++;
                continue;
            }
            break;
        }

        return $validSequence;
    }
}
