# 🎓 Hướng Dẫn Cài Đặt Dự Án Điểm Đối Đa

Dự án **Điểm Đối Đa** là đồ án tốt nghiệp hỗ trợ sinh viên STU, được xây dựng trên nền tảng Laravel. Hướng dẫn này cung cấp các bước chi tiết để thiết lập và chạy dự án.

---

## 📋 Yêu Cầu Hệ Thống
- **XAMPP**: Phiên bản mới nhất ([Tải tại đây](https://www.apachefriends.org/index.html))
- **Composer**: Quản lý thư viện PHP ([Hướng dẫn cài đặt](https://hocwebchuan.com/tutorial/laravel/install_composer.php))
- **Node.js**: Bao gồm NPM để quản lý thư viện JavaScript ([Tải tại đây](https://nodejs.org/))
- **MySQL**: Được tích hợp trong XAMPP
- **PHP**: Phiên bản 8.x
- **Laravel**: Phiên bản 10

---

## ⚙️ Các Bước Cài Đặt

### 1. Thiết Lập Môi Trường
1. Cài đặt **XAMPP** và khởi động các dịch vụ **Apache** và **MySQL**.
2. Cài đặt **Composer** để quản lý các thư viện PHP.
3. Cài đặt **Node.js** để sử dụng NPM quản lý các thư viện JavaScript.

### 2. Chuẩn Bị Dự Án
1. **Tải hoặc clone source code**:
   - Clone dự án vào thư mục `htdocs` của XAMPP:
     ```bash
     git clone <repository-url> toranowebsite
     ```
   - Hoặc tải file nén và giải nén vào `htdocs`.

2. **Tạo database**:
   - Truy cập `http://localhost/phpmyadmin`.
   - Tạo database mới với tên: `toranowebsite`.
   - Chọn kiểu mã hóa: `utf8_general_ci`.

3. **Import database**:
   - Trong **phpMyAdmin**, chọn database `toranowebsite`.
   - Import file `.sql` được cung cấp trong thư mục dự án.

4. **Cấu hình file `.env`**:
   - Tải file `.env.example` từ dự án và đổi tên thành `.env`.
   - Cập nhật các thông tin database trong file `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=toranowebsite
     DB_USERNAME=root
     DB_PASSWORD=
     ```

### 3. Cài Đặt Các Thư Viện
1. Mở **Terminal** trong thư mục dự án (hoặc sử dụng Visual Studio Code: `Ctrl + Shift + ``).
2. Chạy các lệnh sau để cài đặt thư viện:
   ```bash
   composer update --with-all-dependencies
   npm install
   npm run dev
   ```
3. Xóa cache và tạo khóa ứng dụng:
   ```bash
   php artisan cache:clear
   php artisan key:generate
   ```

### 4. Chạy Dự Án
1. Khởi động server Laravel:
   ```bash
   php artisan serve
   ```
2. Truy cập dự án tại:
   - Giao diện người dùng: `http://127.0.0.1:8000`
   - Giao diện quản trị: `http://127.0.0.1:8000/admin`

---

## 🎨 Thông Tin Giao Diện
- **Template Admin**: Samply Admin Template
- **Template User**: Origine Organic Food Template

---

## 🧩 Công Nghệ Sử Dụng
- **Framework**: Laravel 10
- **Ngôn ngữ**: PHP 8
- **Cơ sở dữ liệu**: MySQL
- **Quản lý thư viện**:
  - PHP: Composer
  - JavaScript: NPM

---

## 🛠️ Quản Lý Source Code Với Git
Khi làm việc với source code mới, sử dụng các lệnh Git sau:

```bash
# Kiểm tra nhánh hiện tại
git branch

# Lưu tạm các thay đổi hiện tại
git stash

# Chuyển sang nhánh development
git checkout development

# Cập nhật code mới nhất
git pull

# Quay lại nhánh của bạn
git checkout <ten-nhanh-cua-ban>

# Áp dụng lại các thay đổi đã lưu
git stash pop

# Cập nhật thông tin nhánh từ remote
git fetch

# Đồng bộ với nhánh development
git rebase origin/development
```

---

## 📸 Hình Ảnh Giao Diện
Hình ảnh giao diện dự án có thể được xem tại các liên kết sau:
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

## ❓ Hỗ Trợ
Nếu gặp vấn đề trong quá trình cài đặt, vui lòng liên hệ nhóm phát triển hoặc kiểm tra tài liệu chính thức của Laravel.