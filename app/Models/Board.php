<?php declare(strict_types=1);

namespace App\Models;

class Board
{
    const COLUMNS = 5;

    const ROWS = 3;

    /**
     * Generate a random board
     * @return array
     * @throws \Exception
     */
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

    /**
     * Allocate values in a logical board order
     * @param array $board The random generated board
     * @return array
     */
    public static function getAllocated(array $board): array
    {
        $allocatedBoard = [];
        for ($column=0; $column<self::COLUMNS; $column++) {
            for ($row=0; $row<self::ROWS; $row++) {
                $allocatedBoard[] = $board[$row * self::COLUMNS + $column];
            }
        }

        return $allocatedBoard;
    }

    /**
     * Get the respective Symbols from the generated board
     * @param array $board
     * @return array
     */
    public static function getSymbols(array $board): array
    {
        $symbols = [];
        foreach ($board as $item) {
            $symbols[] = Symbol::SYMBOLS[$item];
        }

        return $symbols;
    }
}
