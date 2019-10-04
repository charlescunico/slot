<?php

use App\Models\Symbol;

class SymbolTest extends TestCase
{
    public function testGetLastKey()
    {
        $expectedKey = count(Symbol::SYMBOLS) - 1;
        $this->assertEquals($expectedKey, Symbol::getLastKey());
    }
}
