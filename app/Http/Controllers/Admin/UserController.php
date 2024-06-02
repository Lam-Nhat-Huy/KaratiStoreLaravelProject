<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as provinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    protected $userRepository;

    public function __construct(UserService $userService, provinceRepository $provinceRepository, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userService->paginate();

        $template = "admin.user.pages.index";

        $config = [
            'css' => [
                '/admin/css/plugins/switchery/switchery.css'
            ],
            'js' => [
                '/admin/js/plugins/switchery/switchery.js'
            ]
        ];

        $config['seo'] = config('apps.user');

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'users',
        ));
    }

    public function create()
    {
        $provinces = $this->provinceRepository->all();
        $template = "admin.user.pages.store";
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugin/ckfinder/ckfinder.js',
                '/admin/lib/location.js',
            ]
        ];

        $config['seo'] = config('apps.user');
        $config['method'] = 'create';

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'provinces',
        ));
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới bảng ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới bảng ghi thất bại');
    }

    public function edit($id)
    {
        $users = $this->userRepository->findById($id);
        $provinces = $this->provinceRepository->all();
        $template = "admin.user.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugin/ckfinder/ckfinder.js',
                '/admin/lib/location.js',
            ]
        ];

        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';


        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'provinces',
            'users',
        ));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if ($this->userService->update($request, $id)) {
            return redirect()->route('user.index')->with('success', 'Cập nhật bảng ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Cập nhật bảng ghi thất bại');
    }

    public function delete($id)
    {
        $user = $this->userRepository->findById($id);
        $template = 'admin.user.pages.delete';
        $config['seo'] = config('apps.user');
        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'user',
        ));
    }

    public function destroy($id)
    {
        if ($this->userService->destroy($id)) {
            return redirect()->route('user.index')->with('success', 'Xóa dữ liệu thành công');
        }
        return redirect()->route('user.index')->with('error', 'Xóa dữ liệu thất bại');
    }
}
