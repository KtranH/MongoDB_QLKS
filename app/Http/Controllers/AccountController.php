<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\QueryDB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    use QueryDB;
    public function Account()
    {
        $user = $this->Inf_User(Cookie::get('tokenLogin'));
        return view('AccountController.Account', compact('user'));
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

        $user = $this->Inf_User($email);

        if (!$user) {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
        if (!Hash::check($password, $user[0]["MatKhau"])) {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }

        $cookie = Cookie::make('tokenLogin', $user[0]["Email"], 0);
        return redirect()->route('showhome')->withCookie($cookie);
    }
    public function Logout()
    {
        Auth::logout();
        Cookie::forget('tokenLogin');
        return redirect()->route('showlogin');
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
