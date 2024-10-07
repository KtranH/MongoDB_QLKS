<?php

namespace App\Http\Controllers;

use App\Models\Category_room;
use App\Models\Room_hotel;
use Illuminate\Http\Request;

class CategoryRoomController extends Controller
{
    //

    public function CategoryRoom()
    {
        $listCategoriesRoom = Category_room::all();
        return view('ManageController.CategoryRoom', compact('listCategoriesRoom'));
    }
    public function AddMoreCategoryRoom(Request $request)
    {
        $request->validate([
            'tenloaiphong' => 'required',
            'succhua' => 'required',
            'dientich' => 'required',
            'tienich' => 'required',
            'noithat' => 'required',
            'quydinh' => 'required',
            'mota' => 'required'
        ], 
[
            'tenloaiphong.required' => 'Vui lòng nhập tên loại phòng',
            'succhua.required' => 'Vui lòng nhập sức chứa',
            'dientich.required' => 'Vui lòng nhập diện tích',
            'tienich.required' => 'Vui lòng nhập tiện ích',
            'noithat.required' => 'Vui lòng nhập nội thất',
            'quydinh.required' => 'Vui lòng nhập quy định',
            'mota.required' => 'Vui lòng nhập mô tả'
        ]);

       try
       {
        $category_room = new Category_room();
        $category_room->tenloai = $request->tenloaiphong;
        $category_room->succhua = $request->succhua;
        $category_room->dientich = $request->dientich;
        $category_room->tienich = $request->tienich;
        $category_room->noithat = $request->noithat;
        $category_room->quydinh = $request->quydinh;
        $category_room->mota = $request->mota;
        $category_room->save();
        return redirect()->back()->with('success', 'Thêm thành công');
       }
       catch(\Exception $e)
       {
        return redirect()->back()->with('error', "Có lỗi xảy ra, không thể thêm!");
       }
    }
    public function ActiveCategoryRoom($id)
    {
        try
        {
            $category_room = Category_room::where('_id', $id)->firstOrFail();
            $category_room->tinhtrang = 1;
            $category_room->save();
            $room = Room_hotel::where('maloai', $id)->update(['tinhtrang' => 1]);
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', "Có lỗi xảy ra, không thể thay đổi!");
        }
    }
    public function DisableCategoryRoom($id)
    {
        try
        {
            $category_room = Category_room::where('_id', $id)->firstOrFail();
            $category_room->tinhtrang = 0;
            $category_room->save();
            $room = Room_hotel::where('maloai', $id)->update(['tinhtrang' => 0]);
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', "Có lỗi xảy ra, không thể thay đổi!");
        }
    }
    public function ShowUpdateCategoryRoom($id)
    {
        $category_room = Category_room::where('_id', $id)->firstOrFail();
        return view('ManageController.CategoryRoom_Update', compact('category_room'));
    }
}
