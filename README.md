# 🎓 Hướng Dẫn Cài Đặt và Vận Hành Dự Án Website Bán Hàng

**Dự án Website Bán Hàng** là đồ án tốt nghiệp hỗ trợ sinh viên Trường Đại học Công nghệ Sài Gòn (STU), được phát triển trên nền tảng **Laravel 10**. Hướng dẫn này cung cấp các bước chi tiết để cài đặt, cấu hình và vận hành dự án, cùng với các mẹo xử lý lỗi thường gặp.

Dự án đã đạt điểm tuyệt đối trong kỳ đồ án tốt nghiệp
---

## 📋 Thông Tin Dự Án

- **Tên dự án**: Website Bán Hàng 
- **Mục đích**: Hỗ trợ sinh viên STU trong việc quản lý và tra cứu điểm số.
- **Công nghệ chính**:
  - **Framework**: Laravel 10
  - **Ngôn ngữ lập trình**: PHP 8.x
  - **Cơ sở dữ liệu**: MySQL
  - **Quản lý thư viện**: Composer (PHP), NPM (JavaScript)
- **Giao diện**:
  - **Admin**: Samply Admin Template
  - **Người dùng**: Origine Organic Food Template

---

## 🔧 Yêu Cầu Hệ Thống

Trước khi bắt đầu, đảm bảo hệ thống của bạn đáp ứng các yêu cầu sau:

| Yêu cầu          | Phiên bản/Chi tiết                                   |
|------------------|----------------------------------------------------|
| **Hệ điều hành** | Windows, macOS, hoặc Linux                         |
| **XAMPP**        | Phiên bản mới nhất ([Tải tại đây](https://www.apachefriends.org/index.html)) |
| **PHP**          | 8.x (Tương thích với Laravel 10)                   |
| **Composer**     | Quản lý thư viện PHP ([Hướng dẫn cài đặt](https://getcomposer.org/download/)) |
| **Node.js**      | Bao gồm NPM ([Tải tại đây](https://nodejs.org/))   |
| **MySQL**        | Tích hợp trong XAMPP                               |
| **Git**          | Công cụ quản lý mã nguồn ([Tải tại đây](https://git-scm.com/downloads)) |

---

## ⚙️ Các Bước Cài Đặt

### 1. Kiểm Tra và Cài Đặt Môi Trường
1. **Cài đặt XAMPP**:
   - Tải và cài đặt XAMPP từ trang chính thức.
   - Khởi động **Apache** và **MySQL** trong bảng điều khiển XAMPP.
   - Kiểm tra hoạt động bằng cách truy cập `http://localhost`.

2. **Cài đặt Composer**:
   - Tải và cài đặt Composer từ [trang chính thức](https://getcomposer.org/download/).
   - Kiểm tra cài đặt:
     ```bash
     composer --version
     ```

3. **Cài đặt Node.js**:
   - Tải và cài đặt Node.js từ [trang chính thức](https://nodejs.org/).
   - Kiểm tra cài đặt:
     ```bash
     node --version
     npm --version
     ```

4. **Cài đặt Git** (nếu chưa có):
   - Tải và cài đặt Git từ [trang chính thức](https://git-scm.com/downloads).
   - Kiểm tra cài đặt:
     ```bash
     git --version
     ```

### 2. Chuẩn Bị Dự Án
1. **Tải hoặc clone mã nguồn**:
   - Clone dự án vào thư mục `htdocs` của XAMPP:
     ```bash
     git clone <repository-url> toranowebsite
     ```
   - Hoặc tải file nén từ kho lưu trữ và giải nén vào `htdocs/toranowebsite`.

2. **Tạo cơ sở dữ liệu**:
   - Truy cập `http://localhost/phpmyadmin`.
   - Tạo database mới:
     - Tên: `toranowebsite`
     - Kiểu mã hóa: `utf8_general_ci`.

3. **Import cơ sở dữ liệu**:
   - Trong **phpMyAdmin**, chọn database `toranowebsite`.
   - Chọn tab **Import** và tải lên file `.sql` từ thư mục dự án.
   - Nhấn **Go** để thực hiện.

4. **Cấu hình file `.env`**:
   - Sao chép file `.env.example` trong thư mục dự án và đổi tên thành `.env`.
   - Cập nhật thông tin cơ sở dữ liệu trong `.env`:
     ```env
     APP_NAME=ToranoWebsite
     APP_ENV=local
     APP_KEY=
     APP_DEBUG=true
     APP_URL=http://localhost:8000

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DBStuff_DATABASE=toranowebsite
     DB_USERNAME=root
     DB_PASSWORD=
     ```
   - Lưu ý: Nếu MySQL yêu cầu mật khẩu, cập nhật `DB_PASSWORD` tương ứng.

### 3. Cài Đặt Thư Viện
1. Mở **Terminal** trong thư mục dự án (hoặc sử dụng Visual Studio Code: `Ctrl + Shift + ``).
2. Cài đặt các thư viện PHP và JavaScript:
   ```bash
   composer update --with-all-dependencies
   npm install
   npm run dev
   ```
3. Xóa cache và tạo khóa ứng dụng:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan key:generate
   ```

### 4. Chạy Dự Án
1. Khởi động server Laravel:
   ```bash
   php artisan serve
   ```
2. Truy cập dự án:
   - **Giao diện người dùng**: `http://127.0.0.1:8000`
   - **Giao diện quản trị**: `http://127.0.0.1:8000/admin`
3. Kiểm tra giao diện:
   - Đảm bảo các tính năng như đăng nhập, tra cứu điểm hoạt động bình thường.
   - Nếu gặp lỗi, xem phần **Xử lý lỗi thường gặp** bên dưới.

---

## 🎨 Thông Tin Giao Diện

- **Giao diện Admin**:
  - Sử dụng **Samply Admin Template**, cung cấp giao diện quản trị hiện đại, dễ sử dụng.
  - Hỗ trợ quản lý người dùng, điểm số, và cấu hình hệ thống.

- **Giao diện Người dùng**:
  - Sử dụng **Origine Organic Food Template**, thân thiện và trực quan.
  - Tối ưu hóa cho trải nghiệm tra cứu điểm số và thông tin cá nhân.

Hình ảnh giao diện dự án:
- [Hình 1](https://github.com/user-attachments/assets/e8b5dc39-a09d-45d0-b18f-c45352a9ca4c)
- [Hình 2](https://github.com/user-attachments/assets/9082851b-4e7d-4cc4-bde0-12a01c9f9332)
- [Hình 3](https://github.com/user-attachments/assets/a8f61618-c626-4def-b258-cfc0fb85f972)
- [Hình 4](https://github.com/user-attachments/assets/9f6b5059-f064-4ff0-93d8-c906c208c6f5)
- [Hình 5](https://github.com/user-attachments/assets/b86ed214-8ffa-47ca-a18c-9075f3770c7b)
- [Hình 6](https://github.com/user-attachments/assets/00c8de4f-3c64-4adf-85d6-89dd300dcaa8)
- [Hình 7](https://github.com/user-attachments/assets/c486c464-5a61-4aba-9945-001cff9aec3a)
- [Hình 8](https://github.com/user-attachments/assets/76db9809-7f4b-424c-9355-9e5a6c4bfeb9)
- [Hình 9](https://github.com/user-attachments/assets/fb457d2b-87cf-4de0-bea6-0aa4deac88d0)
- [Hình 10](https://github.com/user-attachments/assets/be0d43ff-8c43-4edf-8321-22e05e8b429a)

---

## 🛠️ Quản Lý Mã Nguồn Với Git

Để làm việc với mã nguồn và đồng bộ hóa với nhóm, sử dụng các lệnh Git sau:

```bash
# Kiểm tra nhánh hiện tại
git branch

# Lưu tạm các thay đổi hiện tại
git stash

# Chuyển sang nhánh development
git checkout development

# Cập nhật mã nguồn mới nhất
git pull origin development

# Quay lại nhánh của bạn
git checkout <ten-nhanh-cua-ban>

# Áp dụng lại các thay đổi đã lưu
git stash pop

# Cập nhật thông tin nhánh từ remote
git fetch

# Đồng bộ với nhánh development
git rebase origin/development
```

**Lưu ý**:
- Thay `<ten-nhanh-cua-ban>` bằng tên nhánh cá nhân của bạn.
- Nếu xảy ra xung đột khi rebase, sử dụng `git rebase --continue` hoặc `git rebase --abort`.

---

## 🛡️ Xử Lý Lỗi Thường Gặp

| Lỗi                              | Nguyên nhân & Cách khắc phục                                                                 |
|----------------------------------|--------------------------------------------------------------------------------------------|
| **Không kết nối được database**  | - Kiểm tra thông tin `DB_*` trong file `.env`.<br>- Đảm bảo MySQL đang chạy trong XAMPP.   |
| **Lỗi 500 Server Error**         | - Chạy `php artisan cache:clear` và `php artisan config:clear`.<br>- Kiểm tra quyền thư mục (777 cho `storage` và `bootstrap/cache`). |
| **Lỗi thiếu thư viện**           | - Chạy lại `composer update` và `npm install`.<br>- Kiểm tra phiên bản PHP (8.x).          |
| **Giao diện không tải đúng**     | - Chạy `npm run dev` để biên dịch lại tài nguyên JavaScript/CSS.                          |
| **Lỗi key ứng dụng**             | - Chạy `php artisan key:generate` để tạo khóa mới.                                        |

---

## 📦 Cấu Trúc Thư Mục Dự Án

Cấu trúc thư mục chính của dự án:

```
toranowebsite/
├── app/                  # Mã nguồn logic ứng dụng
├── bootstrap/            # Tệp khởi động Laravel
├── config/               # Cấu hình hệ thống
├── database/             # Migrations và seeds
├── public/               # Tài nguyên tĩnh (CSS, JS, hình ảnh)
├── resources/            # Views và tài nguyên giao diện
├── routes/               # Định tuyến
├── storage/              # Lưu trữ logs, cache
├── vendor/               # Thư viện Composer
├── .env                  # Cấu hình môi trường
├── artisan               # Công cụ dòng lệnh Laravel
├── composer.json         # Quản lý thư viện PHP
├── package.json          # Quản lý thư viện JavaScript
```

---

## ❓ Hỗ Trợ và Liên Hệ

- **Tài liệu tham khảo**:
  - [Laravel Documentation](https://laravel.com/docs/10.x)
  - [XAMPP FAQs](https://www.apachefriends.org/faq_windows.html)
- **Liên hệ**:
  - Nếu gặp vấn đề, liên hệ nhóm phát triển qua email hoặc kho lưu trữ dự án.
  - Gửi câu hỏi đến `<repository-url>/issues` nếu sử dụng GitHub.

---

## 📝 Ghi Chú

- Đảm bảo sao lưu database và mã nguồn trước khi thực hiện các thay đổi lớn.
- Kiểm tra thường xuyên cập nhật từ nhánh `development` để đồng bộ mã nguồn.
- Nếu triển khai trên server thật, cập nhật `APP_ENV=production` và tối ưu hóa bằng `php artisan optimize`.