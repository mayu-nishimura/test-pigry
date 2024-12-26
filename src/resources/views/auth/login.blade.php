@extends('layouts.app')

@section('title', 'PiGLy')

@section('header', 'ログイン')

@section('content')
    <!-- バリデーションエラーメッセージの表示 -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">メールアドレス:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            <div class="form__error">
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="password">パスワード:</label>
            <input id="password" type="password" name="password" required>
            <div class="form__error">
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>

    <div>
        <a href="{{ route('registerForm') }}">アカウント作成はこちら</a>
    </div>
@endsection
