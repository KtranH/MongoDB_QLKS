<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    //
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
}
