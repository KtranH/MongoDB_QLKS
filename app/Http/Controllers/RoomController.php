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
            'maloai' => 'required',
            'tenphong' => 'required',
            'succhua' => 'required',
            'giathue' => 'required',
            
        ], 
[
            'maloai.required' => 'Vui lòng chọn mã loại phòng',
            'tenphong.required' => 'Vui lòng nhập tên phòng',
            'succhua.required' => 'Vui lòng nhập sức chứa',
            'giathue.required' => 'Vui lòng nhập giá thuê',
            
        ]);

        try {
            // Tạo phòng mới
            $room = new Room_hotel();
            $room->maloai = $request->maloai; // Lưu mã loại phòng
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
            // Tìm phòng dựa trên ID
            $room = Room_hotel::findOrFail($id);
            // Cập nhật tình trạng của phòng
            $room->tinhtrang = 1; // Bạn có thể thay đổi giá trị này nếu muốn trạng thái khác
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
            // Tìm phòng dựa trên ID
            $room = Room_hotel::where('_id', $id)->firstOrFail();
            
            // Đặt tình trạng phòng thành không hoạt động
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
        $category_room = Category_room::where('tinhtrang', 1)->get();
        return view('ManageController.Room', compact('category_room'));
    }
}
