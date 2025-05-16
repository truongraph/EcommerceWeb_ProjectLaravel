# 🎓 ĐỒ ÁN TỐT NGHIỆP: ĐIỂM ĐỐI ĐA  
> *(Hỗ trợ sinh viên STU hoàn thành đồ án)*

---

## 📸 Hình Ảnh Giao Diện
![image1](https://github.com/user-attachments/assets/e8b5dc39-a09d-45d0-b18f-c45352a9ca4c)  
![image2](https://github.com/user-attachments/assets/9082851b-4e7d-4cc4-bde0-12a01c9f9332)  
![image3](https://github.com/user-attachments/assets/a8f61618-c626-4def-b258-cfc0fb85f972)  
![image4](https://github.com/user-attachments/assets/9f6b5059-f064-4ff0-93d8-c906c208c6f5)  
![image5](https://github.com/user-attachments/assets/b86ed214-8ffa-47ca-a18c-9075f3770c7b)  
![image6](https://github.com/user-attachments/assets/00c8de4f-3c64-4adf-85d6-89dd300dcaa8)  
![image7](https://github.com/user-attachments/assets/c486c464-5a61-4aba-9945-001cff9aec3a)  
![image8](https://github.com/user-attachments/assets/76db9809-7f4b-424c-9355-9e5a6c4bfeb9)  
![image9](https://github.com/user-attachments/assets/fb457d2b-87cf-4de0-bea6-0aa4deac88d0)  
![image10](https://github.com/user-attachments/assets/be0d43ff-8c43-4edf-8321-22e05e8b429a)  

---

## ⚙️ Hướng Dẫn Cài Đặt

### 1. Cài Đặt Môi Trường
- ✅ Cài [XAMPP](https://www.apachefriends.org/index.html)  
- ✅ Cài [Composer](https://hocwebchuan.com/tutorial/laravel/install_composer.php)  
- ✅ Cài [Node.js](https://nodejs.org/)  

### 2. Thiết Lập Dự Án
```bash
# B1: Tải hoặc clone source về thư mục htdocs của XAMPP
# B2: Truy cập localhost/phpmyadmin và tạo database:
Tên database: toranowebsite  
Kiểu mã hóa: utf8_general_ci  

# B3: Import file .sql (database) vào

# B4: Tải file .env về và đặt vào thư mục gốc của dự án
3. Cài Đặt Package
bash
Copy
Edit
# Mở Terminal (Ctrl + Shift + `) trong Visual Studio Code

composer update --with-all-dependencies
php artisan cache:clear
php artisan key:generate
4. Chạy Dự Án
bash
Copy
Edit
php artisan serve
Truy cập: http://127.0.0.1:8000

Admin: http://127.0.0.1:8000/admin

🎨 Giao Diện Dự Án
Template Admin:
Samply Admin Template

Template User:
Origine Organic Food Template

🧩 Thông Tin Công Nghệ
Laravel: 10

PHP: 8

Database: MySQL

Package Manager: Composer, NPM

🛠️ Các Lệnh GIT Khi Lấy Source Mới
bash
Copy
Edit
# Kiểm tra nhánh hiện tại
git branch

# Lưu thay đổi hiện tại
git stash

# Chuyển sang nhánh development
git checkout development

# Cập nhật code mới nhất từ nhánh development
git pull

# Quay về lại nhánh cũ của bạn
git checkout <ten-nhanh-cua-ban>

# Lấy lại các thay đổi đã stash
git stash pop

# Lấy thông tin nhánh mới nhất
git fetch

# Đồng bộ lại với development
git rebase origin/development