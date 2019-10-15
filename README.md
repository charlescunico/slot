# Simulated Slot Machine

## About
Consists of a console command created inside a project using [Lumen].

This is a challenge for training purposes.

## The slot command
1. Assume that every bet as the value of 1 Euro

2. Generate a random board with 5 columns and 3 rows using 10 different symbols (9, 10, J, Q, K, A, cat, dog, monkey and bird).
  
3. Use the following logic for numbering each symbol on the board:

```
0 3 6 9 12
1 4 7 10 13
2 5 8 11 14
```

Example: [J, J, J, Q, K, cat, J, Q, monkey, bird, bird, bird, J, Q, A]

These 15 random symbols generate this:

| J   | J   | J   | Q   | K   |
|:---:|:---:|:---:|:---:|:---:|
| Cat | J   | Q   | Mon | Bir |
| Bir | Bir | J   | Q   | A   |

4. A pay out happens when 3 or more consecutive symbols of the same kind are present in a payline, always starting from the first column (0,1,2). For the test consider the following paylines:

* "0 3 6 9 12"
* "1 4 7 10 13"
* "2 5 8 11 14"
* "0 4 8 10 12"
* "2 4 6 10 14"

From the example above 2 paylines are matched "J J J" from "0 3 6 9 12" and "0 4 8 10 12".

5. Pay out return to the player the following amount:

* 3 symbols: 20% of the bet.
* 4 symbols: 200% of the bet.
* 5 symbols: 1000% of the bet.
   
6. Print from the console command the following:

* board: [0,....,14]
* paylines: Array with matched payline and number of matched symbol.
* bet_amount: monetary numbers in cents 1€ = 100cents. In you case is always 100
* total_win: amount won.

Considering the above example the result will be:

```
{
    board: [J, J, J, Q, K, cat, J, Q, monkey, bird, bird, bird, J, Q, A],
    paylines: [{"0 3 6 9 12": 3}, {"0 4 8 10 12":3}],
    bet_amount: 100,
    total_win: 40
}
```

## Installation
Clone or download this repository and execute `composer install`

## Test
Execute unit tests with `php vendor/bin/phpunit`

## Run
Execute `php artisan command:play`


[Lumen]: <https://github.com/laravel/lumen>
