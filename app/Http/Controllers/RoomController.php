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
            $room = LoaiPhong::where("DanhSachPhong.TenPhong", $id)->firstOrFail();

            $getRoomKey = collect($room->DanhSachPhong)->where('TenPhong', $id)->keys()->firstOrFail();
        
            if ($room == null || $getRoomKey === false) {
                return redirect()->back()->with('error', 'Không tìm thấy phòng');
            }
                 
            $updatedRoom = [
                'TenPhong' => $request->input('tenphong'),
                'ViTri' => intval($request->input('vitri')),
                'GiaThue' => doubleval($request->input('giathue')),
                'TinhTrang' => $room->DanhSachPhong[$getRoomKey]['TinhTrang'] 
            ];
        
            if ($room->_id != $request->input('maloai')) {
                $room->pull('DanhSachPhong', $room->DanhSachPhong[$getRoomKey]);
                $room->save();
        
                $newRoomType = LoaiPhong::where('_id', $request->input('maloai'))->firstOrFail();
                $newRoomType->push('DanhSachPhong', $updatedRoom);
                $newRoomType->save();
            } else {
                $room->DanhSachPhong[$getRoomKey] = $updatedRoom;
                $room->save();
            }
            
            return redirect()->back()->with('success', 'Cập nhật phòng thành công');
            
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', "Có lỗi xảy ra, không thể thay đổi!" . $e->getMessage());
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
        $category_room = LoaiPhong::all();
        return view('ManageController.Room_Update', compact('room', 'category_room'));
    }
}
