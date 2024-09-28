@extends('container')
@section('content')    
<title>GTX - Trang quản lý</title>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Trang chủ</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Trang chủ</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card" style="border-radius:20px">

              <div class="card-body">
                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                font-optical-sizing: auto;
                font-weight: 600;
                font-style: normal;
                font-size: 14px;">Số khách lưu trú <span>| Tất cả</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-users" style="color: #74C0FC;"></i>
                  </div>
                  <div class="ps-3">
                    <h6>
                      10
                    </h6>
                    <span class="text-success small pt-1 fw-bold">Đã</span><span class="text-muted small pt-2 ps-1">ghé thăm</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card" style="border-radius:20px">
          
              <div class="card-body">
                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                font-optical-sizing: auto;
                font-weight: 600;
                font-style: normal;
                font-size: 14px;">Số phòng còn trống <span>| Tất cả</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-table-list" style="color: #63E6BE;"></i>
                  </div>
                  <div class="ps-3">
                    <h6>
                      60
                    </h6>
                    <span class="text-success small pt-1 fw-bold">Vẫn còn</span><span class="text-muted small pt-2 ps-1">trống</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card" style="border-radius:20px">

              <div class="card-body">
                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                font-optical-sizing: auto;
                font-weight: 600;
                font-style: normal;
                font-size: 14px;">Doanh thu <span>| Tất cả</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-star" style="color: #fb5032;"></i>
                  </div>
                  <div class="ps-3">
                    <h6>
                      50
                    </h6>
                    <span class="text-danger small pt-1 fw-bold">VNĐ</span><span class="text-muted small pt-2 ps-1">từ trước đến nay</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto" style="border-radius:20px">

              <div class="card-body">
                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                font-optical-sizing: auto;
                font-weight: 600;
                font-style: normal;
                font-size: 14px;">Danh sách phiếu thuê phòng <span>| Tất cả</span></h5>

                <h5 id="title" style="color:red;font-weight:bold"></h5>
                <table class="table table-borderless datatable" id = "adminTable">
                  <thead>
                      <tr>
                        <th scope="col">Mã khách</th>
                        <th scope="col">Mã phòng</th>
                        <th scope="col">Tên khách</th>
                        <th scope="col">Mã phiếu</th>
                        <th scope="col">Tình trạng</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- End Recent Sales -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto" style="border-radius:20px">

              <div class="card-body pb-0">
                <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
                font-optical-sizing: auto;
                font-weight: 600;
                font-style: normal;
                font-size: 14px;">Những loại phòng tiêu biểu <span>| Tất cả</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Mã loại</th>
                      <th scope="col">Tên loại</th>
                      <th scope="col">Giá thuê</th>
                      <th scope="col">Tổng số lần thuê</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Budget Report -->
        <div class="card" style="border-radius:20px">


          <div class="card-body pb-0">
            <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
            font-size: 14px;">Thống kê nhận phòng và hủy phòng <span>| Tất cả</span></h5>

            <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                  tooltip: {
                  trigger: 'axis',
                  axisPointer: {
                    type: 'shadow'
                  }
                },
                  legend: {},
                  xAxis: {
                  type: 'category',
                  data: ['Số lượng']
                },
                yAxis: {
                  type: 'value'
                },
                series: [
                  {
                    name: "Nhận phòng",
                    data: [50],
                    type: 'bar'
                  },
                  {
                    name: "Hủy phòng",
                    data: [10],
                    type: 'bar'
                  }
                ]
                });
              });
            </script>

          </div>
        </div><!-- End Budget Report -->

        <!-- Website Traffic -->
        <div class="card" style="border-radius:20px">

          <div class="card-body pb-0">
            <h5 class="card-title" style="margin-top:-10px; font-family: 'Montserrat', sans-serif;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
            font-size: 14px;">Số lượng các loại phòng <span>| Tất cả</span></h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Đang hiển thị',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 10,
                        name: 'Phòng cao cấp'
                      },
                      {
                        value: 20,
                        name: 'Phòng phổ thông'
                      },
                      {
                        value: 30,
                        name: 'Phòng giá rẻ'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->

      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->

@endsection