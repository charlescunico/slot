<?php

use App\Models\Board;

class BoardTest extends TestCase
{
    public function testGetRandom()
    {
        $board = Board::getRandom();
        $expectedCount = 15;

        $this->assertIsArray($board);
        $this->assertCount($expectedCount, $board);
        array_walk($board,
            function ($item) {
                $this->assertGreaterThanOrEqual(0, $item);
                $this->assertLessThan(10, $item);
            }
        );
    }
}
