<?php

namespace App\Console\Commands;

use App\Models\Checkin;
use App\Models\Checkout;
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
        $checkout = Checkout::where('TinhTrang', "Chờ thanh toán")->get();
        foreach($checkout as $item){
            $date = Carbon::parse($item->NgayLap);
            if(!$today->greaterThanOrEqualTo($date)){
               $item->TinhTrang = "Quá hạn trả phòng"; 
               $item->NgayLap = $today->format('Y-m-d');
               $item->save();
            }
        }
    }
}
