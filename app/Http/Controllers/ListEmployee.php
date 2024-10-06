<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ListEmployee extends Controller
{
    //
    public function Employee()
    {
        $employee = Employee::take(1)->get();
        return view('ManageController.Employee', compact('employee'));  
    }
}
