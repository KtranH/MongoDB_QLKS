@extends('container')
@section('content')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Chi tiết đặt và nhận phòng</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Đặt và nhận phòng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item">Đặt và nhận phòng</li>
                <li class="breadcrumb-item active">Chi tiết đặt và nhận phòng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-8" style="width:100%">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ctpdkt">Chi tiết đặt và nhận phòng</button>
                            </li>
                        </ul>
                          <div class="tab-content pt-2">

                             <div style="display:flex; justify-content:space-between; margin-bottom:20px">
                               <div style="display:flex; flex-wrap:wrap; max-width:350px">
                                  <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                  font-optical-sizing: auto;
                                  font-weight: 400; 
                                  font-style: bold;">Nhận phòng từ 
                                  <span style="font-weight:bold;color:red">{{ $takeCheckin->NgayCheckin }}</span> đến <span style="font-weight:bold;color:red">{{ $takeCheckin->NgayCheckOutDuKien }}</span>
                                  </h5>
                                  <div style="marign-bottom:20px">
                                    <a href="" type="submit" class="btn btn-primary">Hoàn tất nhận phòng</a>
                                    <a href="" type="submit" class="btn btn-primary">Đặt trước</a>
                                  </div>
                               </div>
                                
                                <div style="display:flex; flex-wrap:wrap; justify-content:flex-end; max-width:350px">
                                  <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                  font-optical-sizing: auto;
                                  font-weight: 400;
                                  font-style: bold;
                                  ">Tổng tiền (tạm tính):  <span style="font-weight:bold;color:red; font-size:18px">{{ number_format($takeBill, 0, ',', '.') }}</span> VNĐ
                                  </h5>
                                  <div style="marign-bottom:20px">
                                    <a href="" type="submit" class="btn btn-danger">Hủy đặt và nhận phòng</a>
                                  </div>
                                </div>
                             </div>

                            <!-- Bảng hiển thị danh sách loại phòng -->
                            <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                            font-optical-sizing: auto;
                            font-weight: 400;
                            font-style: normal;
                            font-size: 14px;">Danh sách khách thuê phòng {{ $takeCheckin->Phong }} (sức chứa: <span style="color:red;font-weight:bold">{{ $takeCapacity }}</span>)</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Mã khách</th>
                                    <th scope="col">Tên khách</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">CMND</th>
                                    <th scope="col">Chức năng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($takeCheckin->DanhSachKhachHang as $item)
                                        <tr>
                                            <th scope="row"><a href="#"></a></th>
                                            <td></td>
                                            <td><a href="#" class="text-primary"></a></td>
                                            <td></td>
                                            <td><a type="button" href="" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
                                        </tr>              
                                    @endforeach
                                </tbody>
                              </table>
                                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: bold;
                                font-style: normal;">Tra cứu khách hàng</h5>
                              <form action="" method="post" style="marign-bottom:20px">
                                @csrf
                                <div style="margin-top:20px; display:flex; justify-content: space-around;margin-bottom: 20px;">
                                    <div style="width:90%;margin-right:20px">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Căn cước:</label>
                                        <div class="col-md-8 col-lg-12">
                                        <input name="makh" type="num" min = "1" minlength = "3" class="form-control" id="fullName" style="box-shadow: rgba(32, 30, 30, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Căn cước không hợp lệ</div>
                                        </div>
                                    </div>  
                                    <div class="text-center" style="margin-top:38px;">
                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </div>
                                </div>
                               </form>
                            <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                            font-optical-sizing: auto;
                            font-weight: bold;
                            font-style: normal;">Kết quả tra cứu</h5>
                             <table class="table table-borderless datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Mã khách</th>
                                    <th scope="col">Tên khách</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">CMND</th>
                                    <th scope="col">Chức năng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($takeCheckin->DanhSachKhachHang as $item)
                                <tr>
                                    <th scope="row"><a href="#"></a></th>
                                    <td></td>
                                    <td><a href="#" class="text-primary"></a></td>
                                    <td></td>
                                    <td><a href="" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fi fi-rr-file-edit"></i></a></td>
                                </tr>              
                                @endforeach
                            </tbody>
                          </table>
                          <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                          font-optical-sizing: auto;
                          font-weight: bold;
                          font-style: normal;">Thêm mới khách hàng</h5>
                            <form action="" method="post">
                              @csrf
                                <div style="width:100%; margin-bottom:20px">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Họ tên:</label>
                                    <div class="col-md-8 col-lg-12">
                                      <input name="hoten" type="text" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                      <div class="invalid-feedback">Họ tên không hợp lệ</div>
                                    </div>
                                </div>  
                                <div style="display:flex; justify-content: space-around;margin-bottom: 20px;">
                                  <div style="width:100%;margin-right:20px">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Căn cước:</label>
                                    <div class="col-md-8 col-lg-12">
                                      <input name="cmnd" type="number" min="1" minlength="3" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                      <div class="invalid-feedback">Căn cước không hợp lệ</div>
                                    </div>
                                  </div>  
                              <div style="width:100%">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Số điện thoại:</label>
                                <div class="col-md-8 col-lg-12">
                                  <input name="sdt" type="number" min="1" minlength="3" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                  <div class="invalid-feedback">Số điện thoại không hợp lệ</div>
                                </div>
                              </div>  
                            </div>
                              <div class="text-center" style="margin-top:20px;">
                                <button type="submit" class="btn btn-primary">Thêm khách hàng</a>
                              </div>
                            </form>
                          </div>
                        </div>                                
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
@endsection