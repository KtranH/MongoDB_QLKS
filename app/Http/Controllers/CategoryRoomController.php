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
}
