<?php

namespace App\Http\Controllers;

use App\Models\Category_room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function Room()
    {
        $category_room = Category_room::all();
        return view('ManageController.Room', compact('category_room'));
    }
}
