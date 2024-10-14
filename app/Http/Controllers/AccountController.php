<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AccountController extends Controller
{
    public function Account()
    {
        $user = Employee::where('email', Cookie::get('tokenLogin'))->first();
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

        $employee = Employee::where('email', $email)->first();
        if (!$employee || !Hash::check($password, $employee->Matkhau)) {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }

        $cookie = Cookie::make('tokenLogin', $employee->email, 0);
        return redirect()->route('showhome')->withCookie($cookie);
    }

    public function Logout()
    {
        Cookie::forget('tokenLogin');
        return redirect()->route('showlogin');
    }

    public function UpdateAccount(Request $request)
    {
        // Lấy user hiện tại dựa vào token cookie
        $user = Employee::where('email', Cookie::get('tokenLogin'))->first();

        // Kiểm tra nếu user không tồn tại
        if (!$user) {
            return redirect()->back()->with('error', 'Tài khoản không tồn tại');
        }

        // Thực hiện validate các dữ liệu nhận được từ form
        $request->validate([
            'tennv' => 'required|string|max:255',
            'email' => 'required|email|unique:nhanvien,email,' . $user->_id . ',_id', // email phải unique nhưng cho phép email hiện tại của user
            'ngaysinh' => 'required|date',
            'ngvl' => 'required|date',
            'sdt' => 'nullable|numeric',
            'diachi' => 'nullable|string|max:255',
        ], [
            'tennv.required' => 'Vui lòng nhập tên nhân viên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'ngaysinh.required' => 'Vui lòng chọn ngày sinh',
            'ngvl.required' => 'Vui lòng chọn ngày vào làm',
        ]);

        // Cập nhật thông tin
        try {
            $user->tennv = $request->input('tennv');
            $user->email = $request->input('email');
            $user->ngaysinh = Carbon::parse($request->input('ngaysinh'));
            $user->ngvl = Carbon::parse($request->input('ngvl'));
            $user->sdt = $request->input('sdt');
            $user->diachi = $request->input('diachi');

            // Lưu lại
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật tài khoản thành công');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Có lỗi xảy ra, không thể cập nhật');
        }
    }

    public function Setting()
    {
        return view('AccountController.Setting');
    }
}
