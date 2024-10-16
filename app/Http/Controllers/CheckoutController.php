<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\DichVu;
use App\QueryDB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    use QueryDB;
    public function Checkout()
    {
        $checkout = Checkout::where('TinhTrang', "Chưa thanh toán")->get();
        return view('CheckoutController.Checkout',compact('checkout'));
    }
    public function DetailCheckout($id)
    {
        $checkout = Checkout::where('_id', $id)->firstOrFail();
        $service = DichVu::where('TinhTrang', 1)->get();
        $duration = Carbon::parse($checkout->bookingCheckin->NgayCheckin)->diffInDays(Carbon::parse($checkout->bookingCheckin->NgayCheckOutDuKien));
        $listServiceInCheckout = [];
        foreach($checkout->DanhSachDichVuDaSuDung as $item)
        {
            $get_service = DichVu::where('_id', $item['DichVu'])->firstOrFail();
            $listServiceInCheckout[] = 
            [
                '_id' => $get_service->_id,
                'TenDichVu' => $get_service->TenDichVu,
                'SoLuong' => $item['SoLuong'],
                'DonGia' => $item['DonGia'],
            ];
        }
        return view('CheckoutController.DetailCheckout',compact('checkout', 'service', 'duration', 'listServiceInCheckout'));
    }

    public function AddServiceToCheckout(Request $request, $idCheckout, $idService, $price)
    {
        try
        {
            $check = $this->Check_Exist_Service_Checkout($idService);
            $checkout = Checkout::where('_id', $idCheckout)->firstOrFail();
            if($check)
            {
                $serviceToCheckout = [
                    'DichVu' => $idService,
                    'SoLuong' => 1,
                    'DonGia' => doubleval($price),
                ];
                $checkout->push('DanhSachDichVuDaSuDung', $serviceToCheckout);
                $checkout->save();
            }
            return redirect()->back()->with('success', 'Thêm dịch vụ thành công');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', "Lỗi không xác định không thể thêm!" . $e->getMessage());
        }
    }
    public function CancelServiceCheckout($idCheckout, $idService)
    {
        try
        {
            $checkout = Checkout::where('_id', $idCheckout)->firstOrFail();
            $getKeyService = collect($checkout->DanhSachDichVuDaSuDung)->where('DichVu', $idService)->keys()->first();
            $checkout->pull('DanhSachDichVuDaSuDung', $checkout->DanhSachDichVuDaSuDung[$getKeyService]);
            $checkout->save();
            return redirect()->back()->with('success', 'Xóa dịch vụ thành công');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', "Lỗi không xác định không thể xóa!" . $e->getMessage());
        }
    }
}
