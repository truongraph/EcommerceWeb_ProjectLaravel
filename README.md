# 🎓 Hướng Dẫn Cài Đặt và Triển Khai Dự Án Điểm Đối Đa

Dự án **Điểm Đối Đa** là đồ án tốt nghiệp hỗ trợ sinh viên STU, được phát triển trên nền tảng **Laravel 10**. Hướng dẫn này cung cấp các bước chi tiết để cài đặt, cấu hình, và chạy dự án một cách hiệu quả.

---

## 📋 Tổng Quan Dự Án
- **Mục đích**: Hỗ trợ sinh viên STU quản lý và thực hiện đồ án tốt nghiệp.
- **Công nghệ chính**:
  - Framework: Laravel 10
  - Ngôn ngữ: PHP 8.x
  - Cơ sở dữ liệu: MySQL
  - Quản lý thư viện: Composer (PHP), NPM (JavaScript)
- **Giao diện**:
  - Người dùng: Origine Organic Food Template
  - Quản trị: Samply Admin Template

---

## 🛠️ Yêu Cầu Hệ Thống

### Yêu Cầu Tối Thiểu
- **Hệ điều hành**: Windows 10/11, macOS, hoặc Linux (Ubuntu 20.04+)
- **RAM**: 4GB (khuyến nghị 8GB)
- **Dung lượng ổ cứng**: 2GB trống
- **Trình duyệt**: Chrome, Firefox, Edge (phiên bản mới nhất)

### Phần Mềm Cần Thiết
- **XAMPP**: Phiên bản 8.0+ ([Tải tại đây](https://www.apachefriends.org/index.html))
- **Composer**: Phiên bản 2.x ([Hướng dẫn cài đặt](https://getcomposer.org/doc/00-intro.md))
- **Node.js**: Phiên bản 16.x hoặc cao hơn, bao gồm NPM ([Tải tại đây](https://nodejs.org/))
- **Git**: Để quản lý source code ([Tải tại đây](https://git-scm.com/))
- **Visual Studio Code** (khuyến nghị): Để chỉnh sửa mã nguồn ([Tải tại đây](https://code.visualstudio.com/))

---

## ⚙️ Hướng Dẫn Cài Đặt

### 1. Chuẩn Bị Môi Trường
1. **Cài đặt XAMPP**:
   - Tải và cài đặt XAMPP, đảm bảo bật **Apache** và **MySQL**.
   - Kiểm tra hoạt động của XAMPP bằng cách truy cập `http://localhost`.

2. **Cài đặt Composer**:
   - Chạy lệnh kiểm tra:
     ```bash
     composer --version
     ```
   - Nếu chưa cài, làm theo hướng dẫn tại [getcomposer.org](https://getcomposer.org/).

3. **Cài đặt Node.js**:
   - Xác nhận cài đặt thành công:
     ```bash
     node --version
     npm --version
     ```

4. **Cài đặt Git**:
   - Kiểm tra phiên bản:
     ```bash
     git --version
     ```

### 2. Thiết Lập Dự Án
1. **Tải source code**:
   - Clone dự án vào thư mục `htdocs` của XAMPP:
     ```bash
     git clone <repository-url> toranowebsite
     ```
   - Hoặc tải file nén từ repository và giải nén vào `htdocs/toranowebsite`.

2. **Tạo database**:
   - Truy cập `http://localhost/phpmyadmin`.
   - Tạo database với tên: `toranowebsite`.
   - Chọn kiểu mã hóa: `utf8mb4_unicode_ci` (để hỗ trợ Unicode đầy đủ).

3. **Import database**:
   - Trong **phpMyAdmin**, chọn database `toranowebsite`.
   - Nhấn tab **Import**, chọn file `.sql` từ thư mục dự án, và nhấn **Go**.

4. **Cấu hình file `.env`**:
   - Sao chép file `.env.example` thành `.env`:
     ```bash
     cp .env.example .env
     ```
   - Chỉnh sửa thông tin database trong `.env`:
     ```env
     APP_NAME="Diem Doi Da"
     APP_ENV=local
     APP_KEY=
     APP_DEBUG=true
     APP_URL=http://127.0.0.1:8000

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=toranowebsite
     DB_USERNAME=root
     DB_PASSWORD=
     ```
   - **Lưu ý**: Nếu MySQL có mật khẩu, cập nhật `DB_PASSWORD` tương ứng.

### 3. Cài Đặt Thư Viện
1. Mở **Terminal** trong thư mục dự án (trong VS Code: `Ctrl + Shift + ``).
2. Cài đặt các thư viện PHP:
   ```bash
   composer update --with-all-dependencies
   ```
3. Cài đặt các thư viện JavaScript:
   ```bash
   npm install
   npm run dev
   ```
4. Tạo khóa ứng dụng và xóa cache:
   ```bash
   php artisan key:generate
   php artisan cache:clear
   php artisan config:cache
   php artisan route:cache
   ```

### 4. Chạy Dự Án
1. Khởi động server Laravel:
   ```bash
   php artisan serve
   ```
2. Truy cập:
   - **Giao diện người dùng**: `http://127.0.0.1:8000`
   - **Giao diện quản trị**: `http://127.0.0.1:8000/admin`
3. **Thông tin đăng nhập mặc định** (nếu có):
   - Vui lòng kiểm tra file `README.md` hoặc tài liệu dự án để biết tài khoản/mật khẩu admin.

---

## 🔒 Cấu Hình Bảo Mật
- **Chmod file `.env`**:
  ```bash
  chmod 600 .env
  ```
- **Tắt chế độ debug trên production**:
  - Trong file `.env`, đặt:
    ```env
    APP_DEBUG=false
    ```
- **Cập nhật mật khẩu MySQL**:
  - Đảm bảo tài khoản MySQL không sử dụng mật khẩu rỗng trong môi trường production.

---

## 🛠️ Quản Lý Source Code Với Git
Để làm việc với repository, sử dụng các lệnh Git sau:

```bash
# Kiểm tra nhánh hiện tại
git branch

# Lưu tạm các thay đổi
git stash

# Chuyển sang nhánh development
git checkout development

# Cập nhật code mới nhất
git pull

# Quay lại nhánh của bạn
git checkout <your-branch-name>

# Áp dụng lại các thay đổi đã lưu
git stash pop

# Cập nhật thông tin nhánh từ remote
git fetch

# Đồng bộ với nhánh development
git rebase origin/development
```

---

## 🐞 Xử Lý Lỗi Thường Gặp
1. **Lỗi "Composer dependencies not installed"**:
   - Chạy lại:
     ```bash
     composer install
     ```
2. **Lỗi "Key not generated"**:
   - Chạy:
     ```bash
     php artisan key:generate
     ```
3. **Lỗi kết nối database**:
   - Kiểm tra thông tin trong `.env` và đảm bảo MySQL đang chạy.
4. **Lỗi giao diện không hiển thị đúng**:
   - Xóa cache giao diện:
     ```bash
     php artisan view:clear
     npm run dev
     ```

---

## 📸 Hình Ảnh Giao Diện
Hình ảnh giao diện dự án có thể được xem trên repository:
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

## 📚 Tài Liệu Tham Khảo
- [Laravel Documentation](https://laravel.com/docs/10.x)
- [XAMPP Documentation](https://www.apachefriends.org/docs/)
- [Composer Documentation](https://getcomposer.org/doc/)
- [Node.js Documentation](https://nodejs.org/en/docs/)

---

## ❓ Hỗ Trợ
Nếu gặp vấn đề, vui lòng:
1. Kiểm tra phần **Xử Lý Lỗi Thường Gặp**.
2. Liên hệ nhóm phát triển qua email hoặc kênh hỗ trợ được cung cấp.
3. Tham khảo tài liệu trong thư mục dự án (`README.md`).