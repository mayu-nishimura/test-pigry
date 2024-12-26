<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // ログインフォームを表示
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate();
            if (!Auth::attempt($credentials)) {
                throw ValidationException::withMessages([
                    'email' => [trans('auth.failed')],
            ]);
        }

        // ログイン成功時のリダイレクト先
        return redirect()->intended('/dashboard')
    }
    
    public function logout()
    { 
        Auth::logout();
        return redirect('/login');
    }
}
