<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserCatalogueRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use Illuminate\Http\Request;

class UserCatalogueController extends Controller
{
    protected $userCatalogueService;
    protected $userCatalogueRepository;

    public function __construct(UserCatalogueService $userCatalogueService, UserCatalogueRepository $userCatalogueRepository)
    {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function index(Request $request)
    {
        $userCatalogues = $this->userCatalogueService->paginate($request);

        $template = "admin.user.catalogue.pages.index";

        $config = [
            'css' => [
                '/admin/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                '/admin/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ]
        ];

        $config['seo'] = config('apps.userCatalogue');

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'userCatalogues',
        ));
    }

    public function create()
    {
        $template = "admin.user.catalogue.pages.store";
        $config['seo'] = config('apps.userCatalogue');
        $config['method'] = 'create';
        return view('admin.dashboard.layout', compact(
            'template',
            'config',
        ));
    }

    public function store(StoreUserCatalogueRequest $request)
    {
        if ($this->userCatalogueService->create($request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Thêm mới bảng ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Thêm mới bảng ghi thất bại');
    }

    public function edit($id)
    {
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $template = "admin.user.catalogue.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugin/ckfinder_2/ckfinder.js',
                '/admin/lib/location.js',
            ]
        ];

        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';


        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'userCatalogue',
        ));
    }

    public function update(Request $request, $id)
    {
        if ($this->userCatalogueService->update($request, $id)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Cập nhật bảng ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Cập nhật bảng ghi thất bại');
    }

    public function delete($id)
    {
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $template = 'admin.user.catalogue.pages.delete';
        $config['seo'] = config('apps.userCatalogue');
        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'userCatalogue',
        ));
    }

    public function destroy($id)
    {
        if ($this->userCatalogueService->destroy($id)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Xóa dữ liệu thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Xóa dữ liệu thất bại');
    }
}
