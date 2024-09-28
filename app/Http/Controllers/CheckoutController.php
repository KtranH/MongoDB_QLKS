<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function Checkout()
    {
        return view('CheckoutController.Checkout');
    }
    public function HistoryCheckout()
    {
        return view('CheckoutController.HistoryCheckout');
    }
}
