<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
         // ユーザー登録処理
         $validated = $request->validated();
         // User::create($validated);

         // パスワードをハッシュ化
         $validatedData['password'] = Hash::make($validatedData['password']);

         // ユーザーを作成
         $user = User::create($validatedData);

         // 初期体重登録画面にリダイレクト
         return redirect()->route('initialWeightForm');
    }
    
    public function login(LoginRequest $request) 
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }
    }
    
    public function logout()
    {
        Auth::logout();
    }
}
