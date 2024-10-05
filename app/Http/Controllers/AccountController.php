<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Permission_group;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function Account()
    {
        $user = Employee::where('email', Cookie::get('tokenLogin'))->first();
        $birthday = Carbon::instance($user->ngaysinh->toDateTime())->format('d-m-Y');
        $startWork = Carbon::instance($user->ngvl->toDateTime())->format('d-m-Y');
        $position = Permission_group::where('maq', $user->MaNhomQuyen)->first();
        return view('AccountController.Account', compact('user', 'position', 'birthday', 'startWork'));
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
