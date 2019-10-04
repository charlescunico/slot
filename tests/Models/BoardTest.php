<?php

use App\Models\Board;
use App\Models\Symbol;

class BoardTest extends TestCase
{
    public function testGetRandom()
    {
        $board = Board::getRandom();
        $expectedCount = Board::COLUMNS * Board::ROWS;

        $this->assertIsArray($board);
        $this->assertCount($expectedCount, $board);
        array_walk($board,
            function ($item) {
                $this->assertGreaterThanOrEqual(0, $item);
                $this->assertLessThanOrEqual(Symbol::getLastKey(), $item);
            }
        );
    }
}
