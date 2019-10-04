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
        $board = [
            'J', 'J', 'J', 'Q', 'K',
            'cat', 'J', 'Q', 'monkey', 'bird',
            'bird', 'bird', 'J', 'Q', 'A'
        ];
        $expectedPaylines = [['0 3 6 9 12' => 3], ['0 4 8 10 12' => 3]];
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
        $expectedWin = 40;
        $board = [
            'J', 'J', 'J', 'Q', 'K',
            'cat', 'J', 'Q', 'monkey', 'bird',
            'bird', 'bird', 'J', 'Q', 'A'
        ];
        $paylines = Payout::getPaylines($board);
        $this->assertEquals($expectedWin, Payout::getTotalWin($paylines));
    }
}
