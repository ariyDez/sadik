<?php

namespace App\Console\Commands;

use App\Competition;
use Illuminate\Console\Command;

class CheckCompetition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'competition:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check competition, choose winner and etc';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $competitions = Competition::where('finished_at','<=', date('Y-m-d H:i:s'))->get();
        //$competitions = Competition::where('finished_at','<=', date('Y-m-d H:i:s'))->where('status', '>=', 5)->get();
        foreach($competitions as $competition)
        {
            $participiants = $competition->photoCompetitions();
        }
    }

    private function selectWinner($participiants)
    {
        $participiantsArr = $participiants->toArray();
        $participiants = array_sort($participiants, function($value){
           return $value['likes'];
        });
        //$winner = 
    }
}
