/* Thư viện cần cài */
composer require yoeunes/toastr -> thư viện thông báo toast
composer require getsolaris/laravel-make-service --dev-> để tạo folder service 


/* Chú thích */
Chức năng quản lý user cần tạo Service và Repositiory
=> Từ controller gọi qua Servive và từ Service gọi qua Repository
EX: UserController -> UserService -> UserRepository
Lưu ý: nhớ đăng ký service trong AppServiceProvider