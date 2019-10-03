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
        $this->assertEquals([], $paylines);
    }
}
