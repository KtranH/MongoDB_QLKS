<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\NguoiDung;
use Illuminate\Http\Request;

class ListEmployee extends Controller
{
    //
    public function Employee()
    {
        $employee = NguoiDung::all();
        return view('ManageController.Employee', compact('employee'));  
    }
}
