<?php

namespace App\Http\Controllers;

use App\Models\LoaiPhong;
use App\QueryDB;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    use QueryDB;
    public function Room()
    {
        $rooms = LoaiPhong::all();
        return view('ManageController.Room', compact('rooms'));
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
            /*$room = new Room_hotel();
            $room->maloai = $request->maloai; 
            $room->tenphong = $request->tenphong;
            $room->vitri = Intval($request->vitri);
            $room->giathue = Intval($request->giathue);
            $room->tinhtrang = 1;
            $room->save();*/

            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, không thể thêm! ' . $e->getMessage());
        }
    }
    public function UpdateRoom(Request $request, $id)
    {
        $request->validate([
            'tenphong' => 'required',
            'vitri' => 'required',
            'giathue' => 'required',
            
        ],[
            'tenphong.required' => 'Vui lòng nhập tên phòng',
            'vitri.required' => 'Vui lòng nhập sức chứa',
            'giathue.required' => 'Vui lòng nhập giá thuê',
            
        ]);
        
        try
        {
            /*$room = Room_hotel::where('_id', $id)->firstOrFail();
            $room->tenphong = $request->tenphong;
            $room->vitri = Intval($request->vitri);
            $room->giathue = Intval($request->giathue);
            $room->save();*/
            return redirect()->back()->with('success', 'Cập nhật thay đổi thành công');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', "Có lỗi xảy ra, không thể thay đổi!");
        }
    }
    public function ActiveRoom($id)
    {
        try {
            /*$room = Room_hotel::findOrFail($id);
            $room->tinhtrang = 1; 
            $room->save();*/
        
            return redirect()->back()->with('success', 'Cập nhật trạng thái phòng thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, không thể thay đổi! ' . $e->getMessage());
        }
    }
    public function DisableRoom($id)
    {
        try
        {
            /*$room = Room_hotel::where('_id', $id)->firstOrFail();
            $room->tinhtrang = 0;
            $room->save();
            return redirect()->back();*/
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', "Có lỗi xảy ra, không thể thay đổi!");
        }
    }
        
    public function ShowUpdateRoom($id)
    {
        $room = $this->Get_Room($id);
        if($room == false)
        {
            return back()->with('error', 'Không tìm thấy phòng');
        }
        $category_room = LoaiPhong::all();
        return view('ManageController.Room_Update', compact('room', 'category_room'));
    }
}
