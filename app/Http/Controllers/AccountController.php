<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function Account()
    {
        return view('AccountController.Account');
    }
    public function SignUp()
    {
        return view('AccountController.SignUp');
    }

    public function Login()
    {
        return view('AccountController.Login');
    }
    public function Logout()
    {
        return view('AccountController.Logout');
    }
    public function UpdateAccout()
    {
        return view('AccountController.UpdateAccout');
    }
    public function Setting()
    {
        return view('AccountController.Setting');
    }
}
