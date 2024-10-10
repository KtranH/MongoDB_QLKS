<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Booking_Checkin extends Model
{
    use HasFactory;
    protected $collection = 'Booking_Checkin';
    protected $fillable = ['NhanVienLap', 'Phong', 'NgayBooking', 'NgayCheckin', 'NgayCheckOutDuKien', 'DanhSachKhachHang'];

    public function khachThue()
    {
        return $this->belongsToMany(KhachThue::class, null, 'DanhSachKhachHang', 'CMND'); 
    }
    public function checkout()
    {
        return $this->hasOne(Checkout::class, 'Booking_Checkin', '_id');
    }
}
