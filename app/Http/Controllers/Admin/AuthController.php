<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (Auth::id() > 0) {
            return redirect()->route('dashboard.index');
        }
        return view('admin.auth.login');
    }

    public function login(AuthLoginRequest $request)
    {
        $credentials = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ];


        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->route('auth.index')->with('error', 'Tên đăng hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate(true);

        $cookieNames = [$request->session()->getName(), Auth::getRecallerName()];

        foreach ($cookieNames as $cookieName) {
            cookie()->queue(cookie()->forget($cookieName));
        }

        return redirect()->route('auth.index');
    }
}
