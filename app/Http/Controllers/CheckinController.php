<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\LoaiPhong;
use App\QueryDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckinController extends Controller
{
    //
    use QueryDB;
    public function Checkin()
    {
        $checkIn = Checkin::all();
        return view('Checkin_Controller.Checkin', compact('checkIn'));
    }   
    public function AddCheckin()
    {
        $roomAvailable = LoaiPhong::where('TinhTrang', 1)->get();
        return view('Checkin_Controller.NewCheckin', compact('roomAvailable'));
    }
    public function DetailCheckin(Request $request)
    {
        $roomAvailable = json_decode($request->input('roomavailable'), true);
        $room = $this->Get_Room($roomAvailable[0]['value']);
        if($room == null)
        {
            return redirect()->back()->with('error', 'Phòng không tồn tại');
        }

        $employee = $this->Inf_User(Cookie::get('tokenLogin'));
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');

        $newCheckin = new Checkin();
        $newCheckin->NhanVienLap = $employee[0]['CMND'];
        $newCheckin->Phong = $roomAvailable[0]['value'];
        $newCheckin->NgayCheckin = $checkin;
        $newCheckin->NgayCheckOutDuKien = $checkout;
        $newCheckin->DanhSachKhachHang = [];
        $newCheckin->TinhTrang = "Chờ xác nhận";
        $newCheckin->save();

        $bill = $this->Number_Of_Days_InHotel($checkin, $checkout) * $room[0]['GiaThue'];
        
        return redirect()->route('savedetailcheckin', ['id' => $newCheckin->_id, 'bill' => $bill, 'capacity' => $room[1]['SucChua']]);
    }
    public function SaveDetailCheckin($id, $bill, $capacity)
    {
        $takeID = $id;
        $takeBill = $bill;
        $takeCapacity = $capacity;
        $takeCheckin = Checkin::where('_id', $id)->firstOrFail();
        return view('Checkin_Controller.DetailCheckin', compact('takeID', 'takeBill', 'takeCapacity', 'takeCheckin'));
    }
}
