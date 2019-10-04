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

    public function testGetAllocatedWithoutParameter()
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Too few arguments to function App\Models\Board::getAllocated()');
        Board::getAllocated();
    }

    public function testGetAllocatedWithInvalidParameter()
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Argument 1 passed to App\Models\Board::getAllocated() must be of the type array');
        Board::getAllocated('10');
    }

    public function testGetAllocated()
    {
        $board = [
            0,  1,  2,  3,  4,
            5,  6,  7,  8,  9,
            10, 11, 12, 13, 14
        ];
        $expectedBoard = [
            0, 5, 10,
            1, 6, 11,
            2, 7, 12,
            3, 8, 13,
            4, 9, 14
        ];
        $allocatedBoard = Board::getAllocated($board);
        $this->assertEquals($expectedBoard, $allocatedBoard);
    }

    public function testGetSymbolsWithoutParameter()
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Too few arguments to function App\Models\Board::getSymbols()');
        Board::getSymbols();
    }

    public function testGetSymbolsWithInvalidParameter()
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Argument 1 passed to App\Models\Board::getSymbols() must be of the type array');
        Board::getSymbols('10');
    }

    public function testGetSymbols()
    {
        $board = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4];
        $expectedSymbols = ['9', '10', 'J', 'Q', 'K', 'A', 'cat',
            'dog', 'monkey', 'bird', '9', '10', 'J', 'Q', 'K'];
        $symbols = Board::getSymbols($board);
        $this->assertEquals($expectedSymbols, $symbols);
    }
}
