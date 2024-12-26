<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateUser
{
    public function authenticate(Request $request)
        {
            $credentials = $request->only('email', 'password');

            Validator::make($input, [
            'email' => [
                'required',
                Rule::unique(User::class),
            ],
            'password' =>['required', 'string'],
            ])->validate();

            if (!Auth::attempt($credentials)) {
                throw ValidationException::withMessages([
                    Fortify::username() => [trans('auth.failed')],
                ]);
            }
            
            return Auth::user();
        }

    }
