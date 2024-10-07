@extends('container')
@section('content')
    <!-- Link icon -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <title>GTX - Quản lý nhận phòng</title>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Nhận phòng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item">Nhận phòng</li>
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
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pdktt">Nhận
                                        phòng</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade active show profile-overview" id="pdktt">

                                    <h5 class="card-title"
                                        style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                        font-optical-sizing: auto;
                                        font-weight: bold;
                                        font-style: normal;
                                        font-size: 14px;">
                                        Phòng khả dụng</h5>



                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã phòng</th>
                                                <th scope="col">Tên phòng</th>
                                                <th scope="col">Tên loại</th>
                                                <th scope="col">Sức chứa</th>
                                                <th scope="col">Giá thuê</th>
                                                <th scope="col">Tình trạng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <h5 class="card-title"
                                        style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                                        font-optical-sizing: auto;
                                        font-weight: bold;
                                        font-style: normal;
                                        font-size: 14px;">
                                        Chọn ngày thuê và trả</h5>
                                    <form class="needs-validation" novalidate method="POST" action="#">
                                        @csrf

                                        <div style="display:flex; justify-content: space-around;margin-bottom: 20px;">
                                            <div style="width:100%;margin-right:20px;">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label"
                                                    style="font-weight:bold">Ngày thuê:</label>
                                                <div class="col-md-8 col-lg-12">
                                                    <?php
                                                    $now = new DateTime();
                                                    $DateN = $now->format('Y-m-d');
                                                    ?>
                                                    <input name="dater" type="date" class="form-control" id="fullName"
                                                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                                        value="{{ $DateN }}" readonly required>
                                                    <div class="invalid-feedback">Ngày tháng không hợp lệ</div>
                                                </div>
                                            </div>

                                            <div style="width:100%">
                                                <label for="Country" class="col-md-4 col-lg-3 col-form-label"
                                                    style="font-weight:bold">Ngày trả:</label>
                                                <div class="col-md-8 col-lg-12">
                                                    <input name="datep" type="date" min=1 class ="form-control"
                                                        id="Country" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                                        required>
                                                    <div class="invalid-feedback">Ngày tháng không hợp lệ</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label"
                                                style="font-weight:bold">Mã phòng:</label>
                                            <div class="col-md-8 col-lg-12">
                                                <input name="roomname" type="text" class="form-control" id="fullName"
                                                    style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" required>
                                                <div class="invalid-feedback">Mã phòng không hợp lệ</div>
                                            </div>
                                        </div>
                                        <div class="text-center" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endSection
