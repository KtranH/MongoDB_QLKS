<?php

namespace App\Http\Controllers;

use App\Models\Category_room;
use Illuminate\Http\Request;

class CategoryRoomController extends Controller
{
    //

    public function CategoryRoom()
    {
        $listCategoriesRoom = Category_room::all();
        return view('ManageController.CategoryRoom', compact('listCategoriesRoom'));
    }
    public function ShowUpdateCategoryRoom($id)
    {
        $category_room = Category_room::where('_id', $id)->firstOrFail();
        return view('ManageController.CategoryRoom_Update', compact('category_room'));
    }
}
