@extends('container')
@section('content')

<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Quản lý nhân viên</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Nhân viên</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item">Quản lý</li>
                <li class="breadcrumb-item active">Nhân viên</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#danhSachPhong">Danh sách nhân viên</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lichSuDatPhong">Thêm nhân viên</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-2">

                          <div class="tab-pane fade active show profile-overview" id="danhSachPhong">
                             <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                             font-optical-sizing: auto;
                             font-weight: 400;
                             font-style: normal;">Danh sách nhân viên hiện tại</h5>

                             @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                             @endif

                             @if (Session::has('error'))  
                                <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                             @endif

                            <!-- Bảng hiển thị danh sách loại phòng -->

                            <table class="table table-borderless datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">CMND</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Ngày vào làm</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Chức vụ</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Chức năng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($employee as $item)
                                    @php
                                      $ChucVu = $item->TenQuyenHan;
                                    @endphp
                                    @foreach ($item->DanhSachTaiKhoan as $x)
                                    <tr>
                                        <th scope="row"><a href="#" class="text-primary">{{ $x["CMND"] }}</a></th>
                                        <td>{{ $x["TenNhanVien"] }}</td>
                                        <td>{{ \Carbon\Carbon::createFromTimestampMs($x["NgaySinh"])->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::createFromTimestampMs($x["NgayVaoLam"])->format('d-m-Y') }}</td>
                                        <td>{{ $x["SDT"] }}</td>
                                        <td>{{ $ChucVu }}</td>
                                        @if ($x["IsDelete"] == 1)
                                            <td><span class="badge bg-danger">Không hoạt động</span></td>
                                        @else
                                            <td><span class="badge bg-success">Còn hoạt động</span></td>
                                        @endif
                                        <td><a href="" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fi fi-rr-file-edit"></i>
                                        </a><a href="" type="button" title="Khôi phục" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC"><i class="fa-solid fa-arrow-rotate-left" style="color: #ffffff;"></i></a>
                                        <a href="" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><i class="fi fi-br-cross"></i></a></td>
                                    </tr>              
                                    @endforeach
                                  @endforeach
                                </tbody>
                              </table>

                          </div>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show profile-overview" id="lichSuDatPhong">
                                
                                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: bold;
                                font-style: normal;">Thêm một nhân viên</h5>
                        
                             <!-- Form hiển thị thêm loại phòng -->
                                <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="#">
                                @csrf
                                  <div style="width:100%; display: flex;justify-content:space-around;margin-bottom: 20px">
                                    <div style="width:100%">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Họ tên:</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="tennhanvien" type="text" class="form-control" id="company" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                          <div class="invalid-feedback">Họ tên không hợp lệ</div>
                                        </div>
                                    </div>
    
                                      <div style="width:100%">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Ngày sinh:</label>
                                        <div class="col-md-8 col-lg-9">
                                          <input name="ngaysinh" type="date" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                          <div class="invalid-feedback">Ngày sinh không hợp lệ</div>
                                        </div>
                                      </div>  

                                      <div style="width:100%">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Ngày vào làm:</label>
                                        <div class="col-md-8 col-lg-9">
                                          <input name="ngayvaolam" type="date" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                          <div class="invalid-feedback">Ngày vào làm không hợp lệ</div>
                                        </div>
                                      </div> 
                                  </div>  
              
                                  <div style="width:100%; display: flex;justify-content:space-around;margin-bottom: 20px">
                                    <div style="width:100%">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Email:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="company" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Email không hợp lệ</div>
                                        </div>
                                    </div>
                
                                    <div style="width:100%">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Password:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="matkhau" type="password" minlength="6" class="form-control" id="Job" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Password không hợp lệ</div>
                                        </div>
                                    </div>

                                    <div style="width:100%">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">CMND:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="cmnd" type="password" minlength="6" class="form-control" id="Job" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">CMND không hợp lệ</div>
                                        </div>
                                    </div>

                                  </div>
            
                                  <div style="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Số điện thoại:</label>
                                    <div class="col-md-8 col-lg-11">
                                      <input name="sdt" type="number" min = "1" minlength="10" class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                      <div class="invalid-feedback">Điện thoại không hợp lệ</div>
                                    </div>
                                  </div>

                                  <div style="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Chức năng:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select class="form-select" aria-label="Default select example" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;margin-bottom:60px;width:122%" name="tenquyenhan">
                                            @foreach ($employee as $item)
                                                <option value="{{ $item->_id }}">{{ $item->TenQuyenHan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-2 col-form-label"  style="font-weight:bold">Địa chỉ:</label>
                                    <div class="col-md-8 col-lg-9">
                                      <textarea name="address" class="form-control" id="about" style="height: 100px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;margin-bottom:50px"required></textarea>
                                      <div class="invalid-feedback">Địa chỉ không hợp lệ</div>
                                    </div>
                                  </div>

                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
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