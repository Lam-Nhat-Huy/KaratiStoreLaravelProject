<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;
    protected $testService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->paginate();
        $config = $this->config();
        $template = "admin.user.index";

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'users'
        ));
    }

    private function config()
    {
        return  [
            'css' => [
                '/admin/css/plugins/switchery/switchery.css'
            ],
            'js' => [
                '/admin/js/plugins/switchery/switchery.js'
            ]
        ];
    }
}
