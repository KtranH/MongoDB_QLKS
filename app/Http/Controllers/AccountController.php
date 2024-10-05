<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

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
    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $employee = Employee::where('email', $email)->first();
        if (!$employee) {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
        if (!Hash::check($password, $employee->Matkhau)) {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }

        $cookie = Cookie::make('tokenLogin', $employee->email, 0);

        return redirect()->route('showhome')->withCookie($cookie);
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
