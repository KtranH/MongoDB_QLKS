<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Employee;
use App\Models\KhachThue;
use App\Models\LoaiPhong;
use App\QueryDB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    use QueryDB;
    public function Home()
    {
        $count_Customer = KhachThue::count();
        $category = LoaiPhong::where('DanhSachPhong.TinhTrang', 1)->get();
        $count_Room = 0;
        foreach ($category as $item) {
            foreach($item->DanhSachPhong as $room){
                if($room['TinhTrang'] == 1){
                    $count_Room++;
                }
            }
        }
        $count_Revenue = Checkout::where('TinhTrang', 'Đã thanh toán')->sum('ThanhToan');
        $count_Complete_Checkin = Checkin::where('TinhTrang', 'Đã nhận phòng')->orWhere('TinhTrang', 'Đã thanh toán')->count();
        $count_Reserve_Checkin = Checkin::where('TinhTrang', 'Chờ xác nhận')->count();
        $count_Cancel_Checkin = Checkin::where('TinhTrang', 'Đã hủy')->count();
        $Category_Room = LoaiPhong::where('TinhTrang', 1)->get();
        $count_Category_Room = [];
        foreach ($Category_Room as $item) {
            $count = count( $item->DanhSachPhong);
            $count_Category_Room[] = 
            [
                "Mã loại" => $item->MaLoai,
                "Số phòng" => $count
            ];
        }
        $checkin = Checkin::where('TinhTrang', 'Chờ xác nhận')->get();
        $checkout = Checkout::where('TinhTrang', 'Quá hạn')->get();
        return view('HomeController.Home', compact('count_Customer', 'count_Room', 'count_Revenue', 'count_Complete_Checkin',
         'count_Cancel_Checkin', 'count_Reserve_Checkin','count_Category_Room', 'checkin', 'checkout'));
    }
    public function ReloadHome()
    {
        try
        {
            $today = Carbon::today();

            $checkin = Checkin::where('TinhTrang', 'Chờ xác nhận')->get();
            foreach($checkin as $item){
                $date = Carbon::parse($item->NgayCheckin);
                if($today->greaterThanOrEqualTo($date)){
                   $item->TinhTrang = "Đã hủy";
                   $this->Update_State_Available_Room($item->Phong);
                   $item->save();
                }
            }
            
            $checkout = Checkout::where('TinhTrang', "Chưa thanh toán")->get();
            foreach($checkout as $item){
                $date = Carbon::parse($item->NgayLap);
                if($today->greaterThanOrEqualTo($date)){
                   $item->TinhTrang = "Quá hạn"; 
                   $item->NgayLap = $today->format('Y-m-d');
                   $item->save();
                }
            }
            return redirect()->back()->with('success', 'Làm mới thành công');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', 'Làm mới thất bại');
        }
    }
}
