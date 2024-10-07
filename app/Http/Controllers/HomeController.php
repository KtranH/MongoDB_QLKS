<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function Home()
    {
        return view('HomeController.Home');
    }
}
