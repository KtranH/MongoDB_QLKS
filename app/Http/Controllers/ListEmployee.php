<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\NguoiDung;
use App\QueryDB;
use Illuminate\Http\Request;

class ListEmployee extends Controller
{
    //
    use QueryDB;
    public function Employee()
    {
        $employee = NguoiDung::all();
        return view('ManageController.Employee', compact('employee'));  
    }
    public function ShowUpdateEmployee($id)
    {
        $employee = $this->Get_User($id);
        if($employee == false)
        {
            return redirect()->back()->with('error', 'Không tìm thấy nhân viên');
        }
        $position = NguoiDung::all();
        return view('ManageController.Employee_Update', compact('employee', 'position'));
    }
}
