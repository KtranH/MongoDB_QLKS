<?php

namespace App;

use App\Models\LoaiPhong;
use App\Models\NguoiDung;

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
}
