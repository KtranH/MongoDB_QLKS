@extends('container')
@section('content')
<!-- Link icon -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <title>GTX - Quản lý phòng</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Phòng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item">Quản lý</li>
                <li class="breadcrumb-item active">Phòng</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#danhSachPhong">Danh sách phòng</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lichSuDatPhong">Thêm phòng mới</button>
                            </li>
                        </ul>
                                <div class="tab-content pt-2">

                          <div class="tab-pane fade active show profile-overview" id="danhSachPhong">
                             <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;
                             font-optical-sizing: auto;
                             font-weight: 400;
                             font-style: normal;
                             font-size: 14px;">Danh sách phòng hiện có</h5>

                            <!-- Bảng hiển thị danh sách loại phòng -->
                            <table class="table table-borderless datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Mã phòng</th>
                                    <th scope="col">Tên phòng</th>
                                    <th scope="col">Tên loại</th>
                                    <th scope="col">Sức chứa</th>
                                    <th scope="col">Giá thuê</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Chức năng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($rooms as $item)
                                    <tr>
                                        <th scope="row"><a href="#">{{ $item->_id }}</a></th>
                                        <td>{{ $item->tenphong}}</td>
                                        <td><a href="#" class="text-primary"><?php echo $item->category->tenloai ?></a></td>
                                        <td>{{ $item->category->succhua}}</td>
                                        <td>{{ $item->giathue}}</td>
                                        @if ($item->tinhtrang == 0)
                                            <td><span class="badge bg-danger">Không hoạt động</span></td>
                                        @else
                                            <td><span class="badge bg-success">Còn hoạt động</span></td>
                                        @endif
                                        <td><a href="" type="button" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC">
                                          <i class="fi fi-rr-file-edit"></i></a><a href="{{ route('activeroom', ['id' => $item->_id]) }}" type="button" title="Khôi phục" class="btn btn-info" style="border-radius:20%;margin-right:20px;color:white;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color:#74C0FC">
                                           <i class="fa-solid fa-arrow-rotate-left" style="color: #ffffff;"></i></a><a href="{{ route('disableroom', ['id' => $item->_id]) }}" type="button" class="btn btn-danger" style="border-radius:20%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                            <i class="fi fi-br-cross"></i></a></td>
                                        @if (Session::has('error'))
                                            <td><div class="alert alert-danger" role="alert"> {{ Session::get('error') }} </div></td>
                                        @endif
                                    </tr>              
                                  @endforeach
                                </tbody>
                              </table>

                          </div>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show profile-overview" id="lichSuDatPhong">
                                
                                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                font-optical-sizing: auto;
                                font-weight: bold;
                                font-style: normal;">Thêm một phòng</h5>

                                @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>{{ Session::get('error') }}</strong>
                                </div>
                                @endif

                                
                             <!-- Form hiển thị thêm loại phòng -->
                                <form class="needs-validation" novalidate method="POST" action="{{ route('addroom') }}">
                                 @csrf
                                  <div style="width:100%; display: flex;justify-content:space-around;margin-bottom:20px; flex-wrap:wrap">

                                      <div style="width:100%">
                                          <label for="company" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Tên loại:</label>
                                          <div class="col-md-8 col-lg-9">
                                              <select class="form-select @error ('maloai') is-invalid @enderror" aria-label="Default select example" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" name="maloai">
                                                  <option selected value="Chưa rõ">Lựa chọn loại phòng</option>
                                                  @foreach ($category_room as $item)
                                                      <option value="{{ $item->_id }}">{{ $item->tenloai }}</option>
                                                  @endforeach
                                              </select>
                                              @error('maloai')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                          </div>
                                      </div>
                                      <div style="width:100%">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Tên phòng:</label>
                                        <div class="col-md-8 col-lg-9">
                                          <input name="tenphong" type="text" class="form-control" id="fullName" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                          <div class="invalid-feedback">Tên phòng không hợp lệ</div>
                                        </div>
                                      </div>  

                                      <div style="width:100%">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Vị trí:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="vitri" type="number" min = 1 class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Vị trí không hợp lệ</div>
                                      </div>
                                      
                                      <div style="width:100%">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label"  style="font-weight:bold">Giá thuê:</label>
                                        <div class="col-md-8 col-lg-9">
                                        <input name="giathue" type="number" min = 1 class ="form-control" id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                        <div class="invalid-feedback">Gía thuê không hợp lệ</div>
                                      </div>
                                    </div>
                                  </div>  
                                  <div class="text-center" style="margin-top:20px">
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