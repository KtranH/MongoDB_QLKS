@extends('container')
@section('content')
    <!-- Link icon -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <title>GTX - Quản lý thống kê</title>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tra cứu</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item">Thống kê</li>
                    <li class="breadcrumb-item active">Tra cứu</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">
                <div class="col-xl-8" style="width:100%">

                    <div class="card" style="border-radius:20px;">
                        <div class="card-body pt-4">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#luutru">Khách hàng
                                        lưu trú</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-1">

                                <div class="tab-pane fade active show profile-overview" id="luutru">
                                  
                                  <!-- Bảng hiển thị danh khách hàng từng lưu trú -->

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã khách</th>
                                                <th scope="col">Tên khách</th>
                                                <th scope="col">Căn cước</th>
                                                <th scope="col">Điện thoại</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
                                    </table>

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
