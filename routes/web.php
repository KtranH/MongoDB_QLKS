<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryRoomController;
use App\Http\Controllers\CheckingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListEmployee;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatisticalController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;

// Truy cập trang đăng nhập
Route::get('/login', [AccountController::class, 'Login'])->name("showlogin");

// Gửi yêu cầu đăng nhập
Route::post('/loadLogin', [AccountController::class, 'checkLogin'])->name("loadlogin");

Route::middleware([CheckLogin::class])->group(function () {

    // Truy cập trang chủ
    Route::get('/', [HomeController::class, 'Home'])->name("showhome");

    // Truy cập trang quản lý phòng
    Route::get('/manage/room', [RoomController::class, 'Room'])->name("showroom");

    // Truy cập trang quản lý loại phòng
    Route::get('/manage/categoryroom', [CategoryRoomController::class, 'CategoryRoom'])->name("showcategoryroom");

    // Truy cập trang tùy chỉnh loại phòng
    Route::get('/setting/categoryroom{id}', [CategoryRoomController::class, 'ShowUpdateCategoryRoom'])->name("showupdatecategoryroom");
    Route::post('/setting/updatecategoryroom{id}', [CategoryRoomController::class, 'UpdateCategoryRoom'])->name("updatecategoryroom");
    Route::post('/setting/addmorecategoryroom', [CategoryRoomController::class, 'AddMoreCategoryRoom'])->name("addmorecategoryroom");
    Route::get('/setting/activecategoryroom{id}', [CategoryRoomController::class, 'ActiveCategoryRoom'])->name("activecategoryroom");
    Route::get('/setting/disablecategoryroom{id}', [CategoryRoomController::class, 'DisableCategoryRoom'])->name("disablecategoryroom");

    // Truy cập trang tùy chỉnh phòng
    Route::get('/setting/room{id}', [RoomController::class, 'ShowUpdateRoom'])->name("showupdateroom");
    Route::post('/setting/updateroom{id}', [RoomController::class, 'UpdateRoom'])->name("updateroom");

    // Truy cập trang quản lý dịch vụ
    Route::get('/manage/service', [ServiceController::class, 'Service'])->name("showservice");
    Route::post('/manage/addservice', [ServiceController::class, 'AddService'])->name("addservice");
    Route::get('/setting/service{id}', [ServiceController::class, 'ShowUpdateService'])->name("showupdateservice");
    Route::post('/setting/updateservice{id}', [ServiceController::class, 'UpdateService'])->name("updateservice");

    // Truy cập trang quản lý nhân viên
    Route::get('/manage/employee', [ListEmployee::class, 'Employee'])->name("showemployee");

    // Tùy chỉnh tình trạng phòng
    Route::get('/setting/activeroom{id}', [RoomController::class, 'ActiveRoom'])->name("activeroom");
    Route::get('/setting/disableroom{id}', [RoomController::class, 'DisableRoom'])->name("disableroom");

    // Truy cập trang đặt phòng
    Route::get('/booking', [BookingController::class, 'Booking'])->name("showbooking");

    // Truy cập trang nhận phòng
    Route::get('/checking', [CheckingController::class, 'Checking'])->name("showchecking");

    // Truy cập trang trả phòng
    Route::get('/checkout', [CheckoutController::class, 'Checkout'])->name("showcheckout");

    // Truy cập trang lịch sử trả phòng
    Route::get('/historyCheckout', [CheckoutController::class, 'HistoryCheckout'])->name("showHistoryCheckout");

    // Truy cập trang thống kê tìm kiếm khách hàng
    Route::get('/searchlog', [StatisticalController::class, 'SearchLog'])->name("showsearchlog");

    // Truy cập trang báo cáo nhận phòng
    Route::get('/report', [StatisticalController::class, 'Report'])->name("showreport");

    // Truy cập trang tài khoản
    Route::get('/account', [AccountController::class, 'Account'])->name("showaccount");
    Route::post('/account', [AccountController::class, 'UpdateAccount'])->name('account.update');

    // Đăng xuất tài khoản
    Route::get('/logout', [AccountController::class, 'Logout'])->name("logout");
});
