<?php

namespace App\Http\Controllers;

use App\Models\Category_room;
use App\Models\Room_hotel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function Room()
    {
        $rooms = Room_hotel::with('category')->get();
        $category_room = Category_room::all();
        return view('ManageController.Room', compact('rooms','category_room'));
    }
    public function AddMoreRoom(Request $request)
    {
        $request->validate([
            'tenphong' => 'required',
            'vitri' => 'required',
            'giathue' => 'required',
            
        ], 
[
            'tenphong.required' => 'Vui lòng nhập tên phòng',
            'vitri.required' => 'Vui lòng nhập sức chứa',
            'giathue.required' => 'Vui lòng nhập giá thuê',
            
        ]);

        if($request->maloai == "Chưa rõ")
        {
            return redirect()->back()->with('error', 'Vui lòng chọn loại phòng');
        }

        try {
            $room = new Room_hotel();
            $room->maloai = $request->maloai; 
            $room->tenphong = $request->tenphong;
            $room->vitri = $request->vitri;
            $room->giathue = $request->giathue;
            $room->tinhtrang = 1;
            $room->save();

            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, không thể thêm! ' . $e->getMessage());
        }
    }
    public function ActiveRoom($id)
    {
        try {
            $room = Room_hotel::findOrFail($id);
            $room->tinhtrang = 1; 
            $room->save();
        
            return redirect()->back()->with('success', 'Cập nhật trạng thái phòng thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, không thể thay đổi! ' . $e->getMessage());
        }
    }
    public function DisableRoom($id)
    {
        try
        {
            $room = Room_hotel::where('_id', $id)->firstOrFail();
            $room->tinhtrang = 0;
            $room->save();
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', "Có lỗi xảy ra, không thể thay đổi!");
        }
    }
        
    public function ShowUpdateRoom($id)
    {
        $room = Room_hotel::where('_id', $id)->firstOrFail();
        return view('ManageController.Room_Update', compact('room'));
    }
}
