<?php

namespace App\Console\Commands;

use App\Models\Checkin;
use App\QueryDB;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DailyCheck extends Command
{
    use QueryDB;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $today = Carbon::today();
        $checkin = Checkin::all();
        foreach($checkin as $item){
            $date = Carbon::parse($item->NgayCheckin);
            if(!$today->greaterThanOrEqualTo($date)){
               $item->TinhTrang = "Đã hủy"; 
               $item->save();
            }
        }
    }
}
