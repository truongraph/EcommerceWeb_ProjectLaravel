CÁCH CÀI ĐẶT WEBSITE
1.Nếu chưa có xampp thì cài xampp
2.Nếu chưa có composer thì theo dõi link -> https://hocwebchuan.com/tutorial/laravel/install_composer.php

B1: tải hoặc clone source về bỏ thư mục htdoct của xamp và chạy xamp

B2: tạo database tên toranowebsite với loại general utf8
- import databse vào

B3: Mở source bằng visual code

- Tải file .env về và copy bỏ vô source

Mở terminal như đã hướng dẫn hoặc gõ Ctrl + shift + `

- Gõ lệnh composer update --with-all-dependencies

Đợi cho chạy hết optimize

Sau khi update lại composer xong thì chạy tiếp lệnh

- php artisan key:generate

Xong thì chạy lệnh 

- php artisan serve

thì sẽ ra ip: http://127.0.0.1:8000

vào admin thì thêm /admin

Đây là template admin clone
https://www.preview.pichforest.com/samply/layouts/




---------------------------------------------------------------

Các lệnh khi get source mới về

(Nếu có thay đổi gì ở source)

- Kiểm tra nhánh: git branch

Nhớ nhánh của mình tên là gì

- Cho vào nháp: git stash
- Checkout qua development: git checkout development
- Get source về: git pull
- Checkout qua source cũ của mình: git checkout tênnhánhcủamìnhtrướcđó
- Mở nháp: git stash pop
- Fetch lại: git fetch
- Rebase lại: git rebase origin/development


  

