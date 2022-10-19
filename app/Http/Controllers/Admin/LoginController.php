<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }

        return view('admin.pages.login');
    }

    public function login(LoginRequest $request)
    {
        $url = $request->input('url') ?? route('admin.home');

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }

        $email = $request->email;
        $password = $request->password;
        $attempt = Auth::guard('admin')->attempt([
            'email' => $email,
            'password' => $password,
            'status' => Consts::USER_STATUS['active']
        ]);
        if ($attempt) {
            return redirect($url);
        }

        return redirect()->back()->with(
            'errorMessage',
            __('Wrong credential! Please try again!')
        );
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->back();
    }
}
