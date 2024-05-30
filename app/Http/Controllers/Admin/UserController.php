<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceService;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictService;
use App\Repositories\Interfaces\WardRepositoryInterface as WardService;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    protected $districtRepository;
    protected $wardRepository;

    public function __construct(UserService $userService, ProvinceService $provinceRepository, DistrictService $districtRepository, WardService $wardRepository)
    {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->districtRepository = $districtRepository;
        $this->wardRepository = $wardRepository;
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
        $template = "admin.user.pages.create";

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

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'provinces'
        ));
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới bảng ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới bảng ghi thất bại');
    }
}
