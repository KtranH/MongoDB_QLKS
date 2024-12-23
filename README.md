# Video demo sản phẩm

[Bấm vào đây!!!](https://drive.google.com/file/d/1-8W7JtTVvmP6br3Q_Ja0hhHYlJ5Dccor/view?usp=drive_link)

# Phần mềm quản lý đặt phòng khách sạn

Đề tài "Quản Lý Phòng Đặt Khách Sạn". Giả định các tình huống giữa nhân viên và khách hàng khi khách có nhu cầu đặt phòng tại khách sạn, nhân viên thực hiện các nghiệp vụ cần thiết để đáp ứng nhu cầu của khách hàng. Thực hiện các chức năng đặt phòng và thanh toán đặt phòng ở khách sạn, tổng quan được các đơn đặt phòng đã đặt, tính toán chi phí các hóa đơn, xem lịch sử đặt phòng, chi tiết từng phòng.

![Tổng quan](https://scontent.xx.fbcdn.net/v/t1.15752-9/462245030_1114782760656695_6531671099801741134_n.png?_nc_cat=106&ccb=1-7&_nc_sid=0024fc&_nc_ohc=aisvpcPgttIQ7kNvgEQaGKJ&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=scontent.xx&oh=03_Q7cD1gFmpqSp0dq_vj9gUMUNqvBKBlRhNtN4Fx5IW5M-BdIQZw&oe=679034A2)

# Phạm vi đề tài

Giới hạn trong phạm vi giả định, chỉ tập trung vào 2 nghiệp vụ chính là đặt, nhận phòng và thanh toán đơn trả phòng. Ngoài ra còn các chức năng nhật kí phòng ghi lại lịch sử đặt của khách hoặc của phòng.

# Công nghệ sử dụng

1.    Ngôn ngữ: PHP
2.    Framework: Laravel
3.    Database: MongoDB

# Tổng quan database

![Database Overview](https://scontent.xx.fbcdn.net/v/t1.15752-9/462479445_844603594173176_2014272407004763926_n.png?_nc_cat=101&ccb=1-7&_nc_sid=0024fc&_nc_ohc=oIWfq8MK_XgQ7kNvgE6r8rH&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=scontent.xx&oh=03_Q7cD1gF4TFxS0AvVFQg-wYUN2S8CrZfQ8yjCQwc-HxXImhvlig&oe=67905584)

# Các bước cài đặt

1. ### Tạo project laravel

   ```bash
   composer create-project laravel/laravel QLKS
   ```
2. ### Cài đặt MongoDB for Windown từ [PECL](https://pecl.php.net/package/mongodb/1.17.1/windows)
   
   Sau khi tải xuống thì thêm file '.dll' vào thư mục extensions của PHP
     
   Thêm dòng sau vào file php.ini:
   ```bash
   extension=mongodb
   ```
4. ### Cài đặt jensegers/mongodb
   
   ```bash
   composer require jenssegers/mongodb
   ```
6. ### Cấu hình lại file .env
   
   ```bash
   DB_CONNECTION=mongodb
   DB_HOST=127.0.0.1
   DB_PORT=27017
   DB_DATABASE=ten_cua_database
   DB_USERNAME=
   DB_PASSWORD=
   
   SESSION_DRIVER=file
   ```
# Thành viên trong nhóm

| Họ và tên | MSSV |
|-----------|------|
| Trần Hoàng Anh Khôi | 2001215584 |
| Vũ Thị Bảo Yến | 2001216334 |
| Nguyễn Tấn Lâm | 2001210056 |
| Phạm Thị Thanh Tình | 2001216218 |
