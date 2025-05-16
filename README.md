🎓 HƯỚNG DẪN CÀI ĐẶT ĐỒ ÁN TỐT NGHIỆP: ĐIỂM ĐỐI ĐA

📸 Giao Diện Dự Án
Dự án sử dụng hai template chính:

Template Admin: Samply Admin Template
Template User: Origine Organic Food Template

Hình ảnh giao diện:

Hình 1
Hình 2
Hình 3
Hình 4
Hình 5
Hình 6
Hình 7
Hình 8
Hình 9
Hình 10


🧩 Thông Tin Công Nghệ

Framework: Laravel 10
Ngôn ngữ lập trình: PHP 8
Cơ sở dữ liệu: MySQL
Quản lý package:
Backend: Composer
Frontend: NPM




⚙️ Hướng Dẫn Cài Đặt
1. Cài Đặt Môi Trường
Cài đặt các công cụ cần thiết:

XAMPP (bao gồm Apache, MySQL, PHP)
Composer (quản lý thư viện PHP)
Node.js (bao gồm NPM để quản lý thư viện JavaScript)

Lưu ý: Đảm bảo các công cụ được cài đặt đúng phiên bản tương thích với Laravel 10 và PHP 8.
2. Thiết Lập Dự Án
Thực hiện các bước sau trong thư mục htdocs của XAMPP:

Tải source code:
Clone repository hoặc tải source code về thư mục htdocs.

git clone <URL-repository>


Tạo database:
Truy cập http://localhost/phpmyadmin.
Tạo database với thông tin:
Tên: toranowebsite
Kiểu mã hóa: utf8_general_ci




Import database:
Trong phpMyAdmin, chọn database toranowebsite.
Import file .sql từ thư mục dự án vào database.


Cấu hình file .env:
Copy file .env.example thành .env trong thư mục gốc dự án.
Cập nhật các thông tin database trong file .env:DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toranowebsite
DB_USERNAME=root
DB_PASSWORD=





3. Cài Đặt Package
Mở terminal trong thư mục gốc dự án (sử dụng Visual Studio Code hoặc terminal bất kỳ) và chạy các lệnh sau:
# Cài đặt các thư viện PHP
composer update --with-all-dependencies

# Xóa cache
php artisan cache:clear

# Tạo khóa ứng dụng
php artisan key:generate

4. Chạy Dự Án

Khởi động server Laravel:php artisan serve


Truy cập dự án:
Giao diện người dùng: http://127.0.0.1:8000
Giao diện admin: http://127.0.0.1:8000/admin




🛠️ Quản Lý Source Code Với Git
Khi làm việc với source code mới, sử dụng các lệnh Git sau:
# Kiểm tra nhánh hiện tại
git branch

# Lưu tạm các thay đổi hiện tại
git stash

# Chuyển sang nhánh development
git checkout development

# Cập nhật code mới nhất từ nhánh development
git pull

# Quay về nhánh của bạn
git checkout <ten-nhanh-cua-ban>

# Khôi phục các thay đổi đã lưu tạm
git stash pop

# Cập nhật thông tin nhánh từ remote
git fetch

# Đồng bộ nhánh của bạn với nhánh development
git rebase origin/development


📝 Lưu Ý

Đảm bảo XAMPP đang chạy (Apache và MySQL) trước khi khởi động dự án.
Kiểm tra file .env đã cấu hình đúng thông tin database.
Nếu gặp lỗi, kiểm tra log tại storage/logs/laravel.log để tìm nguyên nhân.

