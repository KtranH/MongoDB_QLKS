<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    //

    public function Report()
    {
        return view('StatisticalController.Report');
    }
    public function SearchLog()
    {
        return view('StatisticalController.SearchLog');
    }
}
