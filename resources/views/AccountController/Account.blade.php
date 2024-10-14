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
                        <h2>{{ $user->tennv }}</h2>
                        <h3>{{ $user->email }}</h3>
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
                                <form action="{{ route('account.update') }}" method="POST">
                                    @csrf

                                    <!-- Chức vụ -->
                                    <div class="row mb-3">
                                        <label for="position" class="col-md-4 col-lg-3 col-form-label">Chức vụ</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="position" type="text" class="form-control" id="position" value="{{ old('position', $user->getPosition->tennhom) }}" disabled>
                                        </div>
                                    </div>

                                    <!-- Họ và tên -->
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Họ và tên</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="tennv" type="text" class="form-control" id="fullName" value="{{ old('tennv', $user->tennv) }}" required>
                                            @error('tennv')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Địa chỉ -->
                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Địa chỉ</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="diachi" type="text" class="form-control" id="address" value="{{ old('diachi', $user->diachi) }}" required>
                                            @error('diachi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Số điện thoại -->
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="sdt" type="tel" pattern="[0-9]{10,11}" class="form-control" id="phone" value="{{ old('sdt', $user->sdt) }}" required>
                                            @error('sdt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Ngày sinh -->
                                    <div class="row mb-3">
                                        <label for="birthday" class="col-md-4 col-lg-3 col-form-label">Ngày Sinh</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="ngaysinh" type="date" class="form-control" id="birthday" 
                                            value="{{ old('ngaysinh', $user->ngaysinh ? \Carbon\Carbon::parse($user->ngaysinh)->format('Y-m-d') : '') }}" required>
                                            @error('ngaysinh')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Ngày vào làm -->
                                    <div class="row mb-3">
                                        <label for="ngvl" class="col-md-4 col-lg-3 col-form-label">Ngày vào làm</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="ngvl" type="date" class="form-control" id="ngvl" 
                                            value="{{ old('ngvl', $user->ngvl ? \Carbon\Carbon::parse($user->ngvl)->format('Y-m-d') : '') }}" required>
                                            @error('ngvl')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" style="border-radius:20px">Lưu và thay đổi</button>
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