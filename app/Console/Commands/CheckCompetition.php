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
        $competitions = Competition::where('started_at','<=', date('Y-m-d'))->where('status', '<=', 5)->get();
        //$competitions = Competition::where('finished_at','<=', date('Y-m-d H:i:s'))->where('status', '>=', 5)->get();
        foreach($competitions as $competition)
        {
            if($competition->status == 0)
            {
                $participiants = $competition->photoCompetitions;
                $winner = $this->selectWinner($participiants);
                $competition->user_id = $winner['user_id'];
                $competition->status = 1;
                $competition->save();
                $this->info('Winner is determ successfully');
            }
            else
            {
                $competition->status = $competition->status+1;
                $competition->save();
                $this->info('Status was grown up successfully');
            }

        }
        $this->info('process is done');
        echo "worked";
    }

    private function selectWinner($participiants)
    {
        //dd($participiants);
        $participiants = array_sort($participiants, function($value){
            return $value['likes'];
        });
        $max = last($participiants);
        // dd($max);
        $winners = array_where($participiants, function($key, $value)use($max){
            return $value['likes'] >= $max['likes'];
        });
        //dd($winners);
        if(count($winners) > 1)
        {
            $winners = array_sort($winners, function($value){
                return $value['created_at'];
            });
        }
        $winner = head($winners);
        return $winner;
    }
}
