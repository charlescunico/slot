<?php

namespace App\Models;

class Symbol
{
    const SYMBOLS = [
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

    public static function getAll(): array
    {
        return self::SYMBOLS;
    }

    public static function getLastKey(): int
    {
        return array_key_last(self::SYMBOLS);
    }
}
