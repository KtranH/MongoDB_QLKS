<?php

namespace App;

use App\Models\KhachThue;
use App\Models\LoaiPhong;
use App\Models\NguoiDung;
use Illuminate\Support\Carbon;

trait QueryDB
{
    //
    public function Inf_User($email)
    {
        $user = NguoiDung::where('DanhSachTaiKhoan.Email', $email)->first();
        if($user == null){
            return false;
        }
        else
        {
            $inf = collect($user->DanhSachTaiKhoan);
            foreach($inf as $item){
                if($item["Email"] == $email){
                    return [$item, $user];
                }
            }
            return [$inf, $user];
        }
    }
    public function Get_User($id)
    {
        $user = NguoiDung::where('DanhSachTaiKhoan.CMND', $id)->first();
        if($user == null){
            return false;
        }
        else
        {
            $inf = collect($user->DanhSachTaiKhoan)->first();
            return [$inf, $user];
        }
    }
    public function Get_Room($id)
    {
        $query = LoaiPhong::where('DanhSachPhong.TenPhong', $id)->firstOrFail();
        if($query == null){
            return false;
        }
        else
        {
            $inf = collect($query->DanhSachPhong);
            foreach ($inf as $item) {
                if($item["TenPhong"] == $id){
                    return [$item, $query];
                }
            }
            return false;
        }
    }
    public function Check_Date_BirthDay($date)
    {
        $today = date("Y-m-d");
        $diff = date_diff(date_create($date), date_create($today));
        if($diff->format('%y') < 18){
            return false;
        }
        else
        {
            return true;
        }
    }
    public function Check_Date_Worked($date)
    {
        $today = date("Y-m-d");
        $work_date = date("Y-m-d", strtotime($date));
        
        if ($work_date <= $today) {
            return true;
        } else {
            return false;
        }
    }
    public function Check_Unique($data)
    {
        $user = NguoiDung::where('DanhSachTaiKhoan.Email', $data)
        ->orWhere('DanhSachTaiKhoan.CMND', $data)
        ->orWhere('DanhSachTaiKhoan.SDT', $data)->first();

        if($user == null){
            return true;
        }
        else
        {
            return false;
        }
    }
    public function Check_Exist($email, $sdt, $cmnd, $emailU, $sdtU, $cmndU)
    {
        if($email != $emailU){
            return $email;
        }
        if($sdt != $sdtU){
            return $sdt;
        }
        if($cmnd != $cmndU){
            return $cmnd;
        }
        return null;
    }
    public function Find_Customer($cmnd)
    {
        $user = KhachThue::where('CMND', $cmnd)->first();
        if($user == null){
            return false;
        }
        else
        {
            return $user;
        }
    }
    public function Number_Of_Days_InHotel($checkin, $checkout)
    {
        $checkinDate = Carbon::parse($checkin);
        $checkoutDate = Carbon::parse($checkout);

        $days = $checkinDate->diffInDays($checkoutDate);
        return $days;
    }
}
