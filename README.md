1: Tải xampp 8.0.32(xampp-windows-x64-8.0.30-0-VS16-installer)
2: đặt thư mục code vào C:\xampp/htdocs
3: vào phpmyadmin tạo DB mới tên laravel
4:đổi tên file .env.example thành .env
5: lấy file DB tại C:\xampp\htdocs\JHO_TECH_Web_test\database\laravel.sql để import vào DB mới tạo ở bước 3,
6:tải và cài đặt composer với quyền admin tại https://getcomposer.org/download/
7: mở code với VS code
8: composer i
9: chạy lệnh :  php artisan config:clear
                php artisan cache:clear
                php artisan optimize
10: chạy lệnh: php artisan serve


Tham khảo:
1: có code seed cho UserSeeder,TaskSeeder,OpportunitySeeder,ContactSeeder
