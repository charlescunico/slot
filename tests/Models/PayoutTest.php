<?php

use App\Models\Payout;

class PayoutTest extends TestCase
{
    public function testGetPaylinesWithoutParameter()
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Too few arguments to function App\Models\Payout::getPaylines()');
        Payout::getPaylines();
    }

    public function testGetPaylinesWithInvalidParameter()
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Argument 1 passed to App\Models\Payout::getPaylines() must be of the type array');
        Payout::getPaylines('10');
    }

    public function testGetPaylines()
    {
        /*
         * 'J',    'J',    'J', 'Q',      'K',
         * 'cat',  'J',    'Q', 'monkey', 'bird',
         * 'bird', 'bird', 'J', 'Q',      'A'
         */
        $board = [2, 2, 2, 3, 4, 6, 2, 3, 8, 9, 9, 9, 2, 3, 5];
        $expectedPaylines = [['0 3 6 9 12' => 3], ['0 4 8 10 12' => 3]];
        $paylines = Payout::getPaylines($board);
        $this->assertEquals($expectedPaylines, $paylines);
    }

    public function testGetPaylinesNoWin()
    {
        $board = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4];
        $expectedPaylines = [];
        $paylines = Payout::getPaylines($board);
        $this->assertEquals($expectedPaylines, $paylines);
    }

    public function testGetPaylinesMaxWin()
    {
        $board = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        $expectedPaylines = [
            ['0 3 6 9 12' => 5],
            ['1 4 7 10 13' => 5],
            ['2 5 8 11 14' => 5],
            ['0 4 8 10 12' => 5],
            ['2 4 6 10 14' => 5]
        ];
        $paylines = Payout::getPaylines($board);
        $this->assertEquals($expectedPaylines, $paylines);
    }

    public function testGetTotalWinWithoutParameter()
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Too few arguments to function App\Models\Payout::getTotalWin()');
        Payout::getTotalWin();
    }

    public function testGetTotalWinWithInvalidParameter()
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Argument 1 passed to App\Models\Payout::getTotalWin() must be of the type array');
        Payout::getTotalWin('11');
    }

    public function testGetTotalWin()
    {
        /*
         * 'J',    'J',    'J', 'Q',      'K',
         * 'cat',  'J',    'Q', 'monkey', 'bird',
         * 'bird', 'bird', 'J', 'Q',      'A'
         */
        $board = [2, 2, 2, 3, 4, 6, 2, 3, 8, 9, 9, 9, 2, 3, 5];
        $expectedWin = 40;
        $paylines = Payout::getPaylines($board);
        $this->assertEquals($expectedWin, Payout::getTotalWin($paylines));
    }

    public function testGetTotalWinNoWin()
    {
        $board = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4];
        $expectedWin = 0;
        $paylines = Payout::getPaylines($board);
        $this->assertEquals($expectedWin, Payout::getTotalWin($paylines));
    }

    public function testGetTotalWinMaxWin()
    {
        $board = [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2];
        $expectedWin = 5000;
        $paylines = Payout::getPaylines($board);
        $this->assertEquals($expectedWin, Payout::getTotalWin($paylines));
    }
}
