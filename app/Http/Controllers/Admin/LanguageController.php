<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\LanguageServiceInterface as LanguageService;
use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;
use App\Http\Requests\StoreLanguageRequest;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected $languageService;
    protected $languageRepository;

    public function __construct(LanguageService $languageService, LanguageRepository $languageRepository)
    {
        $this->languageService = $languageService;
        $this->languageRepository = $languageRepository;
    }

    public function index(Request $request)
    {
        $languages = $this->languageService->paginate($request);

        $template = "admin.language.pages.index";

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

        $config['seo'] = config('apps.language');

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'languages',
        ));
    }

    public function create()
    {
        $template = "admin.language.pages.store";

        $config = [
            'js' => [
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
            ]
        ];

        $config['method'] = 'create';
        $config['seo'] = config('apps.language');

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
        ));
    }

    public function store(StoreLanguageRequest $request)
    {
        if ($this->languageService->create($request)) {
            return redirect()->route('language.index')->with('success', 'Thêm mới bảng ghi thành công');
        }
        return redirect()->route('language.index')->with('error', 'Thêm mới bảng ghi thất bại');
    }

    public function edit($id)
    {
        $languages = $this->languageRepository->findById($id);
        $template = "admin.language.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/location.js',
            ]
        ];

        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';


        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'languages',
        ));
    }

    public function update(Request $request, $id)
    {
        if ($this->languageService->update($request, $id)) {
            return redirect()->route('language.index')->with('success', 'Cập nhật bảng ghi thành công');
        }
        return redirect()->route('language.index')->with('error', 'Cập nhật bảng ghi thất bại');
    }

    public function delete($id)
    {
        $languages = $this->languageRepository->findById($id);
        $template = 'admin.language.pages.delete';
        $config['seo'] = config('apps.language');
        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'languages',
        ));
    }

    public function destroy($id)
    {
        if ($this->languageService->destroy($id)) {
            return redirect()->route('language.index')->with('success', 'Xóa dữ liệu thành công');
        }
        return redirect()->route('language.index')->with('error', 'Xóa dữ liệu thất bại');
    }

    public function switchBackendLanguage($id)
    {
        $this->languageService->switch($id);
        return back();
    }
}
