# TÀI LIỆU HỆ THỐNG WEBSITE CÔNG TY TNHH CƠ ĐIỆN LẠNH ĐỨC NHÂN

Tài liệu kỹ thuật tổng hợp về công nghệ sử dụng, kiến trúc kết nối giữa Website với trang quản trị Admin và hướng dẫn khởi chạy, build dự án.

---

## 1. CÔNG NGHỆ SỬ DỤNG (TECHNOLOGY STACK)

### Backend
- **Ngôn ngữ**: PHP 8.x (Tương thích tốt từ PHP 8.0 đến PHP 8.3).
- **Cơ sở dữ liệu**: MySQL 8.0 / MariaDB, bảng mã `utf8mb4_unicode_ci`.
- **Database Abstraction**: Lớp xử lý dữ liệu PDO (`libraries/class/class.PDODb.php`) hỗ trợ Prepared Statements chống SQL Injection (`class.AntiSQLInjection.php`).
- **Routing Engine**: AltoRouter (`libraries/class/class.AltoRouter.php`) hỗ trợ định tuyến URL thân thiện SEO (`libraries/router.php` và `router_dev.php`).
- **Caching Mechanism**: Bộ nhớ đệm tệp tin (`libraries/class/class.FileCache.php`) tối ưu hóa tốc độ truy vấn cơ sở dữ liệu.
- **Asset Optimization**: Bộ nén CSS và JS tự động (`libraries/class/class.CssMinify.php`, `libraries/class/class.JsMinify.php`).

### Frontend
- **Ngôn ngữ nền tảng**: HTML5, CSS3, JavaScript (ES6+).
- **Framework UI**: Bootstrap 4 Framework (Grid System, Utilities, Flexbox).
- **Icon System**: FontAwesome 5 Pro.
- **Components & Plugins**:
  - Carousel dự án: Custom Vanilla JS Slider với hỗ trợ Autoplay, Touch Swipe trên di động, Mouse Drag trên máy tính và phân trang Sliding Dot.
  - Thư viện trình diễn media: Owl Carousel 2, Fotorama, Fancybox.
  - Tích hợp mạng xã hội: Zalo SDK Widget, Facebook Fanpage Plugin, ShareThis API.
- **Responsive Layout**: Thiết kế tương thích đa nền tảng (Desktop, Laptop, Tablet, Mobile) qua hệ thống Media Queries phân cấp từ `320px` đến `1920px`.

---

## 2. HƯỚNG DẪN BUILD VÀ KHỞI CHẠY DỰ ÁN

### Yêu cầu môi trường
- PHP >= 8.0 (khuyến nghị PHP 8.1 hoặc 8.2).
- MySQL Server >= 5.7 hoặc MySQL 8.0.
- Khuyến nghị sử dụng bộ công cụ **Laragon** (hoặc XAMPP).

### Các bước cài đặt cơ sở dữ liệu
1. Mở phần mềm quản lý MySQL (HeidiSQL, phpMyAdmin hoặc Laragon Database).
2. Tạo mới một Database có tên: `codienlanh_ducnhan` với Collation `utf8mb4_unicode_ci`.
3. Import tệp tin sao lưu cơ sở dữ liệu: `sota_db.sql` nằm ở thư mục gốc dự án.
4. Kiểm tra cấu hình kết nối tại file `libraries/config.php`:
   ```php
   'database' => array(
       'server-name' => 'mysqldb',
       'url' => '/',
       'type' => 'mysql',
       'host' => '127.0.0.1',
       'user' => 'root',
       'pass' => '',
       'dbname' => 'codienlanh_ducnhan',
       'port' => 3306,
       'prefix' => 'table_'
   )
   ```

### Khởi chạy dự án

#### Cách 1: Khởi chạy 1-Click bằng `run.bat` (Tiện lợi nhất)
- Nhấp đúp chuột vào file **`run.bat`** tại thư mục gốc dự án.
- Script sẽ tự động kiểm tra dịch vụ MySQL, khởi chạy server PHP và tự mở trình duyệt tại địa chỉ `http://localhost:8000/`.

#### Cách 2: Khởi chạy bằng dòng lệnh Terminal
Mở PowerShell hoặc Command Prompt tại thư mục dự án và thực thi lệnh:
```bash
php -S localhost:8000 -t . router_dev.php
```
Truy cập Website tại: `http://localhost:8000/`

### Build và đóng gói Asset (CSS/JS)
Khi có sự thay đổi về mã nguồn CSS hoặc JavaScript trong `assets/css/style.css` hoặc các file script, chạy lệnh:
```bash
php build_assets.php
```
Hệ thống sẽ tự động gộp và nén thành `assets/css/cached.css` và `assets/js/cached.js` để phục vụ production.

---

## 3. KẾT NỐI VÀ ĐỒNG BỘ GIỮA WEBSITE VÀ ADMIN QUẢN TRỊ

### Thông tin đăng nhập Admin
- **Đường dẫn quản trị**: `http://localhost:8000/sota/`
- **Tài khoản**: `admin`
- **Mật khẩu**: `admin`

### Kiến trúc luồng đồng bộ dữ liệu (Data Synchronization Flow)
1. **Lưu trữ dữ liệu**: Mọi thao tác thêm/sửa/xóa trên giao diện Admin (`sota/`) được ghi nhận trực tiếp vào các bảng tương ứng trong cơ sở dữ liệu MySQL (`table_setting`, `table_photo`, `table_news`, `table_static`, `table_product`).
2. **Lưu trữ tệp Media**: Hình ảnh tải lên được lưu trữ có tổ chức vào thư mục `upload/` (`upload/photo/`, `upload/news/`, `upload/product/`).
3. **Cơ chế Invalidation Cache tức thì (`$cache->DeleteCache()`)**:
   - Khi Admin nhấn nút **Lưu** ở bất kỳ mục nào (Cài đặt, Hình ảnh, Bài viết, Trang tĩnh), hệ thống sẽ tự động xóa bộ nhớ đệm cache file trong thư mục `caches/`.
   - Giúp Web Khách truy vấn dữ liệu mới nhất từ MySQL ngay lập tức, loại bỏ hoàn toàn độ trễ bộ nhớ đệm.
4. **Hiển thị phía Client**: Các template giao diện phía người dùng (`templates/`) truy vấn dữ liệu động qua đối tượng `$d` (PDODb), hoàn toàn không fix cứng (hardcode) dữ liệu tĩnh.

---

### Bảng Ánh Xạ Phân Hệ Quản Trị Admin ➔ Vị Trí Hiển Thị Website

| STT | Phân hệ Admin | Đường dẫn trong Admin | Bảng Database liên kết | Vị trí hiển thị trên Web Khách |
| :---: | :--- | :--- | :--- | :--- |
| 1 | **Thiết lập thông tin chung** | `index.php?com=setting&act=capnhat` | `table_setting` (`diachi`, `email`, `hotline`, `dienthoai`, `zalo`, `copyright`, `slogan`, `toado_iframe`, `fanpage`) | - **Header:** Tên công ty, Email, Địa chỉ.<br>- **Hero Banner:** Tên công ty, Slogan.<br>- **Mobile Drawer:** Hotline, Email, Địa chỉ.<br>- **Footer:** Hotline, Email, Địa chỉ, Nút Zalo, Nút Fanpage, Bản đồ Google Maps.<br>- **Copyright Bar:** Thông tin bản quyền chân trang. |
| 2 | **Logo công ty** | `index.php?com=photo&act=photo_static&type=logo` | `table_photo` (`type='logo'`, `act='photo_static'`) | Top Header Logo bên góc trái trên toàn bộ các trang. |
| 3 | **Favicon** | `index.php?com=photo&act=photo_static&type=favicon` | `table_photo` (`type='favicon'`, `act='photo_static'`) | Icon hiển thị trên Tab trình duyệt (thẻ `<link rel="shortcut icon">`). |
| 4 | **Hero Banner chính** | `index.php?com=photo&act=photo_static&type=banner` | `table_photo` (`type='banner'`, `act='photo_static'`) | Ảnh nền toàn màn hình của khối Hero Banner đầu trang chủ. |
| 5 | **CTA Banner** | `index.php?com=photo&act=photo_static&type=background-tuvan` | `table_photo` (`type='background-tuvan'`, `act='photo_static'`) | Ảnh nền khu vực banner kêu gọi báo giá ở cuối trang chủ. |
| 6 | **Background Footer** | `index.php?com=photo&act=photo_static&type=background-footer` | `table_photo` (`type='background-footer'`, `act='photo_static'`) | Ảnh nền khu vực chân trang (tùy chọn theo cấu hình). |
| 7 | **Quản lý Đối tác** | `index.php?com=photo&act=man_photo&type=doi-tac` | `table_photo` (`type='doi-tac'`, `hienthi > 0`) | Khối **ĐỐI TÁC** trên trang chủ: Render danh sách logo và link liên kết đối tác từ Admin. |
| 8 | **Mạng xã hội** | `index.php?com=photo&act=man_photo&type=mxh` | `table_photo` (`type='mxh'`, `hienthi > 0`) | Danh sách icon mạng xã hội tại khu vực Footer. |
| 9 | **Quản lý Dự án** | `index.php?com=news&act=man&type=du-an` | `table_news` (`type='du-an'`, `hienthi > 0`) | Khối **DỰ ÁN TIÊU BIỂU** trên trang chủ (phân loại nhóm, tên dự án, ảnh công trình) và trang danh sách `/du-an`. |
| 10 | **Quản lý Dịch vụ** | `index.php?com=news&act=man&type=dich-vu` | `table_news` (`type='dich-vu'`, `hienthi > 0`) | Trang danh mục dịch vụ `/dich-vu` và bài viết chi tiết dịch vụ. |
| 11 | **Quản lý Tin tức** | `index.php?com=news&act=man&type=tin-tuc` | `table_news` (`type='tin-tuc'`, `hienthi > 0`) | Trang tin tức `/tin-tuc` và bài viết chi tiết tin tức. |
| 12 | **Quản lý Sản phẩm** | `index.php?com=product&act=man&type=san-pham` | `table_product` (`type='san-pham'`, `hienthi > 0`) | Trang sản phẩm `/san-pham` và chi tiết sản phẩm. |
| 13 | **Nội dung Giới thiệu** | `index.php?com=static&act=capnhat&type=gioi-thieu` | `table_static` (`type='gioi-thieu'`) | Nội dung chi tiết tại trang `/gioi-thieu` và đoạn mô tả công ty tại Hero Banner trang chủ. |
| 14 | **Nội dung Liên hệ** | `index.php?com=static&act=capnhat&type=lienhe` | `table_static` (`type='lienhe'`) | Đoạn văn bản giới thiệu phía trên form gửi thư tại trang `/lien-he`. |
| 15 | **Nội dung Chân trang** | `index.php?com=static&act=capnhat&type=footer` | `table_static` (`type='footer'`) | Nội dung tĩnh bổ sung tại khu vực Footer. |

---

## 4. QUẢN LÝ TỆP TIN VÀ THƯ MỤC HÌNH ẢNH

- **`upload/photo/`**: Lưu trữ logo, favicon, banner chính, background chân trang và logo đối tác.
- **`upload/news/`**: Lưu trữ hình ảnh đại diện của các bài viết dịch vụ, tin tức và hình ảnh công trình dự án tiêu biểu.
- **`upload/product/`**: Lưu trữ hình ảnh sản phẩm cơ điện lạnh và vật tư thiết bị.
- **`thumbs/`**: Thư mục lưu ảnh thumbnail được tự động sinh (cache thumbnail) theo kích thước tỉ lệ phù hợp cho từng thiết bị duyệt web.
