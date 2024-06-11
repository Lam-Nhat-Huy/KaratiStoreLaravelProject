/* Thư viện cần cài */
composer require yoeunes/toastr -> thư viện thông báo toast
composer require getsolaris/laravel-make-service --dev-> để tạo folder service 


/* Chú thích */
Chức năng quản lý user cần tạo Service và Repositiory
=> Từ controller gọi qua Servive và từ Service gọi qua Repository
EX: UserController -> UserService -> UserRepository
Lưu ý: nhớ đăng ký service trong AppServiceProvider

/* Lưu ý pattern */

- Ở UserController có các hàm gọi các service ở thư mục Services

    public function store(StoreUserRequest $request)
    {
       $this->userService->create($request);
    }

- Thì phải có hàm create($request) ở UserService được use từ UserRepository

    public function create($request)
    {
        $user = $this->userRepository->create($payload);
    }

-  Và hàm public function create($request); ở UserService phải được đăng ký ở UserServiceInterface

    interface UserServiceInterface
    {
        public function create($request);
    }

- Hàm thêm sửa xóa ở UserService thì được code ở BaseRepository
    
    public function create(array $payload = [])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }   

- Hàm public function create(array $payload = []) ở UserRepository thi phải được khai báo ở UserRepositoryInterface

- Qui trình tạo 1 chức năng
+ Tạo controller
+ Tạo Model
+ Tạo Service
+ Tạo Repository
+ config
+ Request
+ view