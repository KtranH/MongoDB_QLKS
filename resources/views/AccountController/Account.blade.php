@extends('container')
@section('content')
<title>GTX - Tùy chỉnh tài khoản</title>
  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Cập nhật thông tin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item">Tài khoản người dùng</li>
                <li class="breadcrumb-item active">Cập nhật thông tin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png" alt="Profile" class="rounded-circle">
                        <h2>{{ $user[0]["TenNhanVien"] }}</h2>
                        <h3>{{ $user[0]["Email"] }}</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card_edit_khoi">
                  <div class="card-image_edit_khoi"></div>
                  <div class="category_edit_khoi"> Thông báo quan trọng </div>
                  <div class="heading_edit_khoi"> Vui lòng bảo mật tài khoản của bạn, không để lộ thông tin quan trọng như cookie, email, số điện thoại!
                      <div class="author_edit_khoi"> Cảnh báo <span class="name_edit_khoi">Bảo mật</span></div>
                  </div>
              </div>
            </div>
            <div class="col-xl-8" style="border-radius:20px;">

                <div class="card" style="border-radius:20px;">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Cập nhật thông tin</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Đổi mật khẩu</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                        
                                <!-- Profile Edit Form -->
                               <form action="#" method="post">
                                @csrf
                                <div class="row mb-3">
                                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Chức vụ</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="position" type="text" class="form-control" id="company" value="{{ $user[1]["TenQuyenHan"] }}" disabled>
                                  </div>
                                </div>

                                    <div class="row mb-3">
                                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Họ và tên</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="fullName" type="text" class="form-control" id="fullName" value="{{ $user[0]["TenNhanVien"] }}" required>
                                        <div class="invalid-feedback">Họ tên không hợp lệ</div>
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Địa chỉ</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control" id="company" value="{{ $user[0]["DiaChi"] }}" required>
                                        <div class="invalid-feedback">Địa chỉ không hợp lệ</div>
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="number" min = 1 minlength= 10 class="form-control" id="Job" value="{{ $user[0]["SDT"] }}" required>
                                        <div class="invalid-feedback">Điện thoại không hợp lệ</div>
                                      </div>
                                    </div>
        
                                    <div class="row mb-3">
                                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Address" value="{{ $user[0]["Email"] }}" required>
                                        <div class="invalid-feedback">Email không hợp lệ</div>
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Ngày Sinh</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="birthday" type="date" class="form-control" id="Phone" value="{{ \Carbon\Carbon::createFromTimestampMs($user[0]["NgaySinh"])->format('Y-m-d') }}"  required>
                                        <div class="invalid-feedback">Ngày sinh không hợp lệ</div>
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Ngày vào làm</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="birthday" type="date" class="form-control" id="Phone" value="{{ \Carbon\Carbon::createFromTimestampMs($user[0]["NgayVaoLam"])->format('Y-m-d') }}" required>
                                        <div class="invalid-feedback">Ngày vào làm không hợp lệ</div>
                                      </div>
                                    </div>            
                                    <div class="text-center">
                                      <button type="submit" name = "check" class="btn btn-primary" style="border-radius:20px">Lưu và thay đổi</button>
                                    </div>
                                  </form>
                                <!-- End Profile Edit Form -->
                            </div>
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="post" action="#">
                                  @csrf
                                    <div class="row mb-3">
                                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="currentPassword">
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                      </div>
                                    </div>
                
                                    <div class="row mb-3">
                                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu</label>
                                      <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                      </div>
                                    </div>
                
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-primary">Lưu và thay đổi</button>
                                    </div>
                                  </form>
                                <!-- End Change Password Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection