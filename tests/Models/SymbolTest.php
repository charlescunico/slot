<?php

use App\Models\Symbol;

class SymbolTest extends TestCase
{
    public function testGetAll()
    {
        $expectedSymbols = [
            '9',
            '10',
            'J',
            'Q',
            'K',
            'A',
            'cat',
            'dog',
            'monkey',
            'bird'
        ];
        $this->assertEquals($expectedSymbols, Symbol::getAll());
    }

    public function testGetLastKey()
    {
        $expectedKey = 9;
        $this->assertEquals($expectedKey, Symbol::getLastKey());
    }
}
