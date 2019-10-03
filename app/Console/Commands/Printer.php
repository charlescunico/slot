<?php

namespace App\Console\Commands;

use App\Models\Payout;
use Illuminate\Console\Command;
use App\Models\Board;

class Printer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:printer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Print the results of the game';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $board = Board::getRandom();
        $paylines = Payout::getPaylines($board);
        $totalWin = Payout::getTotalWin($paylines);

        $output = json_encode([
            'board' => $board,
            'paylines' => $paylines,
            'bet_amount' => 100,
            'total_win' => $totalWin
        ]);
        $this->line($output);
        return $output;
    }
}
