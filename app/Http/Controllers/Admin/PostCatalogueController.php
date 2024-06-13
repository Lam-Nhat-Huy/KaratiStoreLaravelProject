<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueService;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use Illuminate\Http\Request;
use App\Classes\Nestedsetbie;

class PostCatalogueController extends Controller
{
    protected $postCatalogueService;
    protected $postCatalogueRepository;
    protected $nestedset;
    protected $language;

    public function __construct(PostCatalogueService $postCatalogueService, PostCatalogueRepository $postCatalogueRepository)
    {
        $this->postCatalogueService = $postCatalogueService;
        $this->postCatalogueRepository = $postCatalogueRepository;
        $this->nestedset = new Nestedsetbie([
            'table' => 'post_catalogues',
            'foreignkey' => 'post_catalogue_id',
            'language_id' => 11
        ]);
        $this->language = $this->currentLanguage();
    }

    public function index(Request $request)
    {
        $postCatalogues = $this->postCatalogueService->paginate($request);
        $template = "admin.post.catalogue.pages.index";

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

        $config['seo'] = config('apps.postCatalogue');

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'postCatalogues',
        ));
    }

    public function create()
    {
        $template = "admin.post.catalogue.pages.store";
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/seo.js',
            ]
        ];

        $dropdown = $this->nestedset->Dropdown();
        $config['seo'] = config('apps.postCatalogue');
        $config['method'] = 'create';
        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'dropdown',
        ));
    }

    public function store(Request $request)
    {
        if ($this->postCatalogueService->create($request)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Thêm mới bảng ghi thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error', 'Thêm mới bảng ghi thất bại');
    }

    public function edit($id)
    {
        $postCatalogue = $this->postCatalogueRepository->getPostCatalogueById($id, $this->language);
        $template = "admin.post.catalogue.pages.store";
        $dropdown = $this->nestedset->Dropdown();

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
            ]
        ];

        $config['seo'] = config('apps.postCatalogue');
        $config['method'] = 'edit';


        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'postCatalogue',
            'dropdown',
        ));
    }

    public function update(Request $request, $id)
    {
        // dd($this->postCatalogueService->update($request, $id));
        if ($this->postCatalogueService->update($request, $id)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Cập nhật bảng ghi thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error', 'Cập nhật bảng ghi thất bại');
    }

    public function delete($id)
    {
        $postCatalogue = $this->postCatalogueRepository->findById($id);
        $template = 'admin.post.catalogue.pages.delete';
        $config['seo'] = config('apps.postCatalogue');
        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'postCatalogue',
        ));
    }

    public function destroy($id)
    {
        if ($this->postCatalogueService->destroy($id)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Xóa dữ liệu thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error', 'Xóa dữ liệu thất bại');
    }
}
