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
            $room = LoaiPhong::where("_id", $request->maloai)->firstOrFail();
            $addRoom = [
                "TenPhong" => $request->tenphong,
                "ViTri" => intval($request->vitri),
                "GiaThue" => doubleval($request->giathue),
                "TinhTrang" => 1
            ];
            $room->push('DanhSachPhong', $addRoom);
            $room->save();

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
                $update = $room->DanhSachPhong;
                $update[$getRoomKey] = $updatedRoom;
                $room->DanhSachPhong = $update;
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
        try 
        {
            LoaiPhong::where('DanhSachPhong.TenPhong', $id)->update(['DanhSachPhong.$.TinhTrang' => 1]);
            return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái phòng thành công']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra, không thể thay đổi! ' . $e->getMessage()], 500);
        }
    }
    public function DisableRoom($id)
    {
        try
        {
            LoaiPhong::where('DanhSachPhong.TenPhong', $id)->update(['DanhSachPhong.$.TinhTrang' => 0]);
            return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái phòng thành công']);
        }
        catch(\Exception $e)
        {   
            return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra, không thể thay đổi! ' . $e->getMessage()], 500);
        }
    }
        
    public function ShowUpdateRoom($id)
    {
        $room = $this->Get_Room($id);
        $category_room = LoaiPhong::all();
        return view('ManageController.Room_Update', compact('room', 'category_room'));
    }
}
