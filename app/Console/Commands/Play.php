<?php declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Payout;
use Illuminate\Console\Command;
use App\Models\Board;

class Play extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Play the game and print the results';

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        $board = Board::getRandom();
        $paylines = Payout::getPaylines($board);

        $output = json_encode([
            'board' => Board::getSymbols($board),
            'paylines' => $paylines,
            'bet_amount' => Payout::BET_VALUE,
            'total_win' => Payout::getTotalWin($paylines)
        ], JSON_PRETTY_PRINT);

        if ($output) {
            $this->line($output);
            return $output;
        }
    }
}
