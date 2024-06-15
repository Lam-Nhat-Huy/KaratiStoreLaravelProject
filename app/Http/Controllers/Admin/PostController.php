<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Services\Interfaces\PostServiceInterface as PostService;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use Illuminate\Http\Request;
use App\Classes\Nestedsetbie;
use App\Http\Requests\DeletePostCatalogueRequest;

class PostController extends Controller
{
    protected $postService;
    protected $postRepository;
    protected $nestedset;
    protected $language;

    public function __construct(PostService $postService, PostRepository $postRepository)
    {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
        $this->nestedset = new Nestedsetbie([
            'table' => 'post_catalogues',
            'foreignkey' => 'post_catalogue_id',
            'language_id' => 11
        ]);
        $this->language = $this->currentLanguage();
    }

    public function index(Request $request)
    {
        $posts = $this->postService->paginate($request);
        $template = "admin.post.post.pages.index";

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

        $config['seo'] = config('apps.post');

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'posts',
        ));
    }

    public function create()
    {
        $template = "admin.post.post.pages.store";
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
        $config['seo'] = config('apps.post');
        $config['method'] = 'create';
        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'dropdown',
        ));
    }

    public function store(StorePostRequest $request)
    {
        dd($this->postService->create($request));
        if ($this->postService->create($request)) {
            return redirect()->route('post.index')->with('success', 'Thêm mới bảng ghi thành công');
        }
        return redirect()->route('post.index')->with('error', 'Thêm mới bảng ghi thất bại');
    }

    public function edit($id)
    {
        $post = $this->postRepository->getPostById($id, $this->language);
        $template = "admin.post.post.pages.store";
        $dropdown = $this->nestedset->Dropdown();
        $album = json_decode($post->album);
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

        $config['seo'] = config('apps.post');
        $config['method'] = 'edit';


        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'post',
            'dropdown',
            'album'
        ));
    }

    public function update(Request $request, $id)
    {
        if ($this->postService->update($request, $id)) {
            return redirect()->route('post.index')->with('success', 'Cập nhật bảng ghi thành công');
        }
        return redirect()->route('post.index')->with('error', 'Cập nhật bảng ghi thất bại');
    }

    public function delete($id)
    {
        $post = $this->postRepository->findById($id);
        $template = 'admin.post.post.pages.delete';
        $config['seo'] = config('apps.post');
        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'post',
        ));
    }

    public function destroy($id, DeletePostCatalogueRequest $request)
    {
        if ($this->postService->destroy($id)) {
            return redirect()->route('post.index')->with('success', 'Xóa dữ liệu thành công');
        }
        return redirect()->route('post.index')->with('error', 'Xóa dữ liệu thất bại');
    }
}
